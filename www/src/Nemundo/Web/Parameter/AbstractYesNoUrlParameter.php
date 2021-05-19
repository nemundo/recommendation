<?php


namespace Nemundo\Web\Parameter;


abstract class AbstractYesNoUrlParameter extends AbstractUrlParameter
{

    /**
     * @var bool
     */
    public $defaultValue = false;

    /**
     * @return bool
     */
    public function getValue()
    {

        $value = false;
        if (parent::getValue() == 'true' || parent::getValue() == '1') {
            $value = true;
        }
        return $value;

    }

}