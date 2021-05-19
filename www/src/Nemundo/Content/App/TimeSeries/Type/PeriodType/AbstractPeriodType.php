<?php


namespace Nemundo\Content\App\TimeSeries\Type\PeriodType;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractPeriodType extends AbstractBase
{

    public $id;

    public $periodType;


    abstract protected function loadPeriodType();

    public function __construct() {
        $this->loadPeriodType();
    }

}