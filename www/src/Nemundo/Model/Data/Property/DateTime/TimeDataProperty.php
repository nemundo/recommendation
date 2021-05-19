<?php

namespace Nemundo\Model\Data\Property\DateTime;

use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Model\Data\Property\AbstractDataProperty;

class TimeDataProperty extends AbstractDataProperty
{

    public function setValue(Time $time = null)
    {

        if ($time !== null) {
            if (!$time->isNull()) {
                $this->typeValueList->setModelValue($this->type, $time->getIsoTime());
            }
        }

        return $this;

    }

}