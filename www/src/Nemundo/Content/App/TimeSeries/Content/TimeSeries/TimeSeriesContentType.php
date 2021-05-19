<?php

namespace Nemundo\Content\App\TimeSeries\Content\TimeSeries;

use Nemundo\Content\App\TimeSeries\Data\Line\LineDelete;
use Nemundo\Content\App\TimeSeries\Data\Line\LineReader;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeries;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesCount;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesDelete;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesReader;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesRow;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesUpdate;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesData\TimeSeriesDataDelete;
use Nemundo\Content\App\TimeSeries\Index\TimeSeriesIndex;
use Nemundo\Content\App\TimeSeries\Parameter\TimeSeriesParameter;
use Nemundo\Content\App\TimeSeries\Site\TimeSeriesSite;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Type\DateTime\DateTime;

class TimeSeriesContentType extends AbstractContentType
{

    use TimeSeriesIndex;

    public $uniqueName;

    public $timeSeries;

    public $description;

    public $source;

    public $sourceUrl;


    protected function loadContentType()
    {

        $this->typeLabel = 'Time Series';
        $this->typeId = '765821a5-1586-471a-9103-3ff2dee47a20';
        $this->viewClassList[] = TimeSeriesContentView::class;

        $this->viewSite = TimeSeriesSite::$site;
        $this->parameterClass = TimeSeriesParameter::class;

    }


    protected function onCreate()
    {

        $data = new TimeSeries();
        $data->timeSeries = $this->timeSeries;
        $data->uniqueName = $this->uniqueName;
        $data->source = $this->source;
        $data->sourceUrl = $this->sourceUrl;
        $data->lastUpdate=(new DateTime())->setNow();
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new TimeSeriesUpdate();
        $update->timeSeries = $this->timeSeries;
        $update->source = $this->source;
        $update->lastUpdate=(new DateTime())->setNow();
        $update->updateById($this->dataId);

    }


    protected function onDelete()
    {

        $reader = new LineReader();
        $reader->filter->andEqual($reader->model->timeSeriesId, $this->dataId);
        foreach ($reader->getData() as $lineRow) {
            $delete = new TimeSeriesDataDelete();
            $delete->filter->andEqual($delete->model->lineId, $lineRow->id);
            $delete->delete();
        }


        $delete = new LineDelete();
        $delete->filter->andEqual($delete->model->timeSeriesId, $this->dataId);
        $delete->delete();

        (new TimeSeriesDelete())->deleteById($this->dataId);

    }


    protected function onIndex()
    {

        //$this->addSearchText($this->getSubject());

        // add line


    }

    protected function onDataRow()
    {
        $this->dataRow = (new TimeSeriesReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|TimeSeriesRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function fromUniqueName($uniqueName)
    {

        $this->uniqueName = $uniqueName;
        $this->existItem();

    }


    public function existItem()
    {

        $value = false;

        $count = new TimeSeriesCount();
        $count->filter->andEqual($count->model->uniqueName, $this->uniqueName);
        if ($count->getCount() == 1) {

            $value = true;

            $reader = new TimeSeriesReader();
            $reader->filter->andEqual($reader->model->uniqueName, $this->uniqueName);
            $this->dataId = $reader->getRow()->id;

        }

        return $value;

    }

    public function getSubject()
    {
        return $this->getDataRow()->timeSeries;
    }


}