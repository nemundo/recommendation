<?php

namespace Nemundo\Core\Php;


use Nemundo\Core\Base\AbstractBase;


// ObjectBuilder
class PhpClass extends AbstractBase
{

    /**
     * @var string
     */
    private $className;

    public function __construct($className)
    {
        $this->className = $className;
    }


    public function exists()
    {

        $exists = false;

        if (class_exists($this->className)) {
            $exists = true;
        }
        return $exists;

    }


    public function getObject()
    {

        $object = null;


        if ($this->exists()) {
            $object = new $this->className();
        } //else {
        //(new LogMessage())->writeError('Class "' . $className . '" does not exist');
        //}

        return $object;

    }


}