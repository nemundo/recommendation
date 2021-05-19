<?php


namespace Nemundo\Web\Parameter;


use Nemundo\Core\Type\DateTime\Date;

abstract class AbstractDateUrlParameter extends AbstractUrlParameter
{

    public function getDate() {

        return (new Date())->fromGermanFormat($this->getValue());

    }


}