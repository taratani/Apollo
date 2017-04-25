<?php

use PHPUnit\Framework\TestCase;

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class UploadTest extends TestCase
{
    /**
     * @var Upload
     */
    protected $_object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $_FILES = array(
            'test' => array(
                'name' => 'test.png',
                'type' => 'image/png',
                'size' => 542,
                'tmp_name' => __DIR__ . '/_files/source-test.jpg',
                'error' => 0
            )
        );

        $this->_object = new Upload();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        unset($_FILES);
        unset($this->_object);
        @unlink(__DIR__ . '/_files/test.jpg');
    }

    /**
     * @covers Upload::receive
     */
    public function testFileExists()
    {
        $this->assertTrue($this->_object->fileExists('test'));
    }

    public function testCheckSize()
    {
        $this->assertTrue($this->_object->checkSize('test'));
    }

    public function testCheckType()
    {
        $this->assertTrue($this->_object->checkType('test'));
    }

    public function testCheckDir()
    {
        $this->assertTrue($this->_object->checkDir());
    }
}
