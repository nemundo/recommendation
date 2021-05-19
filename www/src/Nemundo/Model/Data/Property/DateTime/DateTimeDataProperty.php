<?php

namespace Nemundo\Model\Data\Property\DateTime;

use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Model\Data\Property\AbstractDataProperty;

class DateTimeDataProperty extends AbstractDataProperty
{

    public function setValue(DateTime $date = null)
    {

        if ($date !== null) {
            if ($date !== null) {
                $this->typeValueList->setModelValue($this->type, $date->getIsoDateTime());
            }
        }

        return $this;

    }

}