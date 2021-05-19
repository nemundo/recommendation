<?php

namespace Nemundo\Model\Data\Property\DateTime;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Model\Data\Property\AbstractDataProperty;


class DateDataProperty extends AbstractDataProperty
{

    public function setValue(Date $date = null)
    {

        if ($date !== null) {
            if (!$date->isNull()) {
                $this->typeValueList->setModelValue($this->type, $date->getIsoDate());
            }
        }

        return $this;

    }

}