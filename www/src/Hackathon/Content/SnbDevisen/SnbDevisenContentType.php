<?php

namespace Hackathon\Content\SnbDevisen;

use Hackathon\Data\Snb\SnbReader;
use Nemundo\Content\App\TimeSeries\Index\TimeSeriesItem;
use Nemundo\Content\App\TimeSeries\Index\TimeSeriesTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Paragraph\Paragraph;


// SnbTimeSeries
class SnbDevisenContentType extends AbstractContentType
{

use TimeSeriesTrait;


    protected function loadContentType()
    {
        $this->typeLabel = 'SnbDevisen';
        $this->typeId = 'f36cb038-2337-4873-a6b4-e742d20ac3cb';

        $this->viewClassList[] = SnbDevisenContentView::class;


        $this->dataId=0;

    }

    protected function onCreate()
    {
    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getTimeSeries()
    {

        /** @var TimeSeriesItem[] $list */
        $list = [];

        $reader = new SnbReader();

        foreach ($reader->getData() as $snbRow) {

            $item = new TimeSeriesItem();
            $item->month = $snbRow->month;
            $item->year=$snbRow->year;
            $item->value=$snbRow->devisen;

            $list[]=$item;


        }

        return $list;

        // TODO: Implement getTimeSeries() method.
    }


}