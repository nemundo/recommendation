<?php


namespace Nemundo\Content\Event;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Content\Type\EventTrait;
use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractContentEvent extends AbstractBaseClass
{

    /**
     * @param AbstractType|AbstractContentType|EventTrait $contentType
     */
    public function onCreate(AbstractType $contentType)
    {

    }


    public function onUpdate(AbstractType $contentType)
    {

    }

}