<?php


namespace Nemundo\Web\Parameter;


abstract class AbstractNumberUrlParameter extends AbstractUrlParameter
{

    /**
     * @var int
     */
    public $defaultValue = 0;

    public function getValue()
    {
        return (int)parent::getValue();
    }


    public function hasValue()
    {

        $returnValue = true;
        if ($this->getValue() == 0) {
            $returnValue = false;
        }

        return $returnValue;

    }


    /*
    public function hasValue()
    {

        $returnValue = true;

        $value =$this->getValue();

        if ($value == 0) {
            $returnValue = false;
        }

        return $returnValue;

    }*/

}