<?php


namespace Nemundo\Content\App\TimeSeries\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\TimeSeries\Base\ValueTrait;

class LineTimeSeriesTable extends AdminTable
{

    use ValueTrait;

    public $lineId;

    public function getContent()
    {

        $header=new TableHeader($this);
        $header->addText('Period');
        $header->addText('Value');

        foreach ($this->getValueReader($this->lineId)->getData() as $seriesDataRow) {
            $row = new TableRow($this);
            $row->addText($seriesDataRow->period->getPeriodText());
            $row->addText($seriesDataRow->value);
        }

        return parent::getContent();

    }

}