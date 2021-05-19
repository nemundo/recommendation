<?php

namespace Nemundo\Content\Index\Calendar;

use Nemundo\Core\Type\DateTime\DateTime;

trait DateTimeIndexTrait
{

    /**
     * @return DateTime
     */
    abstract public function getDateTime();

    public function getDate() {

        return $this->getDateTime()->getDate();

    }


}