<?php

class Upload
{
    /**
     * Destination directory
     *
     * @var string
     */
    public $destination;
    public $maxSize = 1000000;
    public $images = array('image/jpeg', 'image/jpg', 'image/png');

    /**
     * Constructor
     *
     * @param string $destination
     */
    public function __construct()
    {
        $this->destination = 'imgs/';
    }

    /**
     * Receive file
     *
     * @param string $name
     * @return boolean
     */
    public function fileExists($name)
    {
        if(empty($_FILES[$name]['type']))
        {
            return FALSE;
        }

        return TRUE;
    }

    public function checkSize($name){
        if($_FILES[$name]['size'] > $this->maxSize){
            return FALSE;
        }
        return TRUE;
    }

    public function checkType($name){
        foreach($this->images as $value){
            if($value == $_FILES[$name]['type']){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function checkDir(){
        return is_writable($this->destination);
    }
}
