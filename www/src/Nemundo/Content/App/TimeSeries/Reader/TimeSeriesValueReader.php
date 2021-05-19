<?php


namespace Nemundo\Content\App\TimeSeries\Reader;


use Nemundo\Content\App\TimeSeries\Base\ValueTrait;
use Nemundo\Core\Base\DataSource\AbstractDataSource;

class TimeSeriesValueReader extends AbstractDataSource
{

    use ValueTrait;


    private $lineList = [];

    public function addLineId($lineId)
    {
        $this->lineList[] = $lineId;
        return $this;
    }


    protected function loadData()
    {


        $itemList = [];

        foreach ($this->lineList as $lineId) {

            $reader = $this->getValueReader($lineId);
            foreach ($reader->getData() as $seriesDataRow) {

                $periodText = $seriesDataRow->period->getPeriodText();
                $periodNumber = $seriesDataRow->period->getPeriodNumber();
                $found = false;

                foreach ($itemList as $key => $item) {
                    if ($key == $periodNumber) {
                        $item->value[$lineId] = $seriesDataRow->value;
                        $found = true;
                    }
                }

                if (!$found) {
                    $item = new ValueItem();
                    $item->periodText = $seriesDataRow->period->getPeriodText();

                    foreach ($this->lineList as $lineId2) {
                        $item->value[$lineId2] =null;
                    }

                    $item->value[$lineId] = $seriesDataRow->value;

                    $itemList[$periodNumber] = $item;

                    // sorting
                    ksort($itemList);



                }

            }

        }


        foreach ($itemList as $item) {
            $this->addItem($item);
        }


    }


    /**
     * @return ValueItem[]
     */
    public function getData()
    {
        return parent::getData();
    }


}