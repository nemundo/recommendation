<?php


namespace Nemundo\Content\Index\News;


use Nemundo\Core\Type\DateTime\DateTime;

trait NewsIndexTrait
{

    /**
     * @return DateTime
     */
    //abstract public function getDateTime();

    abstract public function getUniqueId();

    abstract public function getTitle();

    abstract public function getLead();

    abstract public function getUrl();

    abstract public function getSource();

    abstract public function getSourceUniqueId();


}