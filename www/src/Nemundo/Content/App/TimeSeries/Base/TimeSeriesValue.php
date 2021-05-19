<?php


namespace Nemundo\Content\App\TimeSeries\Base;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Field\Aggregate\MaxField;
use Nemundo\Db\Sql\Field\Aggregate\MinField;

class TimeSeriesValue extends AbstractBase
{

    use ValueTrait;

    public $lineId;

    public function getMaxValue() {

        $value = null;

        $reader = $this->getValueReader($this->lineId);

        $max = new MaxField($reader);
        $max->aggregateField = $reader->model->value;

        foreach ($reader->getData() as $dataRow) {
            $value = $dataRow->getModelValue($max);
        }

        return $value;


    }


    public function getMinValue() {

        $value = null;

        $reader = $this->getValueReader($this->lineId);

        $max = new MinField($reader);
        $max->aggregateField = $reader->model->value;

        foreach ($reader->getData() as $dataRow) {
            $value = $dataRow->getModelValue($max);
        }

        return $value;



    }

}