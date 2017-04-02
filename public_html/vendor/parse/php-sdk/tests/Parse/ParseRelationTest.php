<?php

namespace Parse\Test;

use Parse\ParseObject;
use Parse\ParseQuery;

class ParseRelationTest extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        Helper::setUp();
    }

    public function tearDown()
    {
        Helper::tearDown();
    }

    /**
     * This function used as a helper function in test functions to save objects.
     *
     * @param int      $numberOfObjects Number of objects you want to save.
     * @param callable $callback        Function which takes int as a parameter.
     *                                  and should return ParseObject.
     */
    public function saveObjects($numberOfObjects, $callback)
    {
        $allObjects = [];
        for ($i = 0; $i < $numberOfObjects; $i++) {
            $allObjects[] = $callback($i);
        }
        ParseObject::saveAll($allObjects);
    }

    public function testParseRelations()
    {
        $children = [];
        $this->saveObjects(
            10,
            function ($i) use (&$children) {
                $child = ParseObject::create('ChildObject');
                $child->set('x', $i);
                $children[] = $child;

                return $child;
            }
        );
        $parent = ParseObject::create('ParentObject');
        $relation = $parent->getRelation('children');
        $relation->add($children[0]);
        $parent->set('foo', 1);
        $parent->save();

        $results = $relation->getQuery()->find();
        $this->assertEquals(1, count($results));
        $this->assertEquals($children[0]->getObjectId(), $results[0]->getObjectId());
        $this->assertFalse($parent->isDirty());

        $parentAgain = (new ParseQuery('ParentObject'))->get($parent->getObjectId());
        $relationAgain = $parentAgain->get('children');
        $this->assertNotNull($relationAgain, 'Error');

        $results = $relation->getQuery()->find();
        $this->assertEquals(1, count($results));
        $this->assertEquals($children[0]->getObjectId(), $results[0]->getObjectId());

        $relation->remove($children[0]);
        $relation->add([$children[4], $children[5]]);
        $parent->set('bar', 3);
        $parent->save();

        $results = $relation->getQuery()->find();
        $this->assertEquals(2, count($results));
        $this->assertFalse($parent->isDirty());

        $relation->remove($children[5]);
        $relation->add(
            [
                $children[5],
                $children[6],
                $children[7],
                $children[8],
            ]
        );
        $parent->save();

        $results = $relation->getQuery()->find();
        $this->assertEquals(5, count($results));
        $this->assertFalse($parent->isDirty());

        $relation->remove($children[8]);
        $parent->save();
        $results = $relation->getQuery()->find();
        $this->assertEquals(4, count($results));
        $this->assertFalse($parent->isDirty());

        $query = $relation->getQuery();
        $query->lessThan('x', 5);
        $results = $query->find();
        $this->assertEquals(1, count($results));
        $this->assertEquals($children[4]->getObjectId(), $results[0]->getObjectId());
    }

    public function testQueriesOnRelationFields()
    {
        $children = [];
        $this->saveObjects(
            10,
            function ($i) use (&$children) {
                $child = ParseObject::create('ChildObject');
                $child->set('x', $i);
                $children[] = $child;

                return $child;
            }
        );

        $parent = ParseObject::create('ParentObject');
        $parent->set('x', 4);
        $relation = $parent->getRelation('children');
        $relation->add(
            [
                $children[0],
                $children[1],
                $children[2],
            ]
        );
        $parent->save();
        $parent2 = ParseObject::create('ParentObject');
        $parent2->set('x', 3);
        $relation2 = $parent2->getRelation('children');
        $relation2->add(
            [
                $children[4],
                $children[5],
                $children[6],
            ]
        );
        $parent2->save();
        $query = new ParseQuery('ParentObject');
        $query->containedIn('children', [$children[4], $children[9]]);
        $results = $query->find();
        $this->assertEquals(1, count($results));
        $this->assertEquals($results[0]->getObjectId(), $parent2->getObjectId());
    }

    /**
     * @group relation-parent-set
     */
    public function testSwitchingParent()
    {
        // setup parent 1
        $parent1 = new ParseObject('ParentObject');
        $relation = $parent1->getRelation('children');

        $child1 = new ParseObject('ChildObject');
        $child1->set('name', 'child1');
        $child1->save();

        $child2 = new ParseObject('ChildObject');
        $child2->set('name', 'child2');
        $child2->save();
        $relation->add([$child1, $child2]);
        $parent1->save();

        // setup parent 2
        $parent2 = new ParseObject('ParentObject');
        $relation = $parent2->getRelation('children');

        $child = new ParseObject('ChildObject');
        $child->set('name', 'child3');
        $child->save();
        $relation->add([$child]);
        $parent2->save();

        // get relation for parent one
        $relation = $parent1->getRelation('children');

        // switch parent to parent 2
        $relation->setParent($parent2);

        // get query for parent 2 instead now
        $query = $relation->getQuery();
        $children = $query->find();

        $this->assertEquals(1, count($children));
        $this->assertEquals('child3', $children[0]->get('name'));

    }
}
