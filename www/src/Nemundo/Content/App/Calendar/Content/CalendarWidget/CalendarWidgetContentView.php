<?php

namespace Nemundo\Content\App\Calendar\Content\CalendarWidget;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Calendar\Data\Calendar\CalendarReader;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Content\App\Calendar\Site\CalendarItemSite;
use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class CalendarWidgetContentView extends AbstractContentView
{
    /**
     * @var CalendarWidgetContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='ac34aed5-6428-4cd8-9dab-8c258c5b4625';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $calendarReader = new CalendarReader();
        $calendarReader->addOrder($calendarReader->model->date);
        $calendarReader->filter->andEqualOrGreater($calendarReader->model->date, (new Date())->setNow()->getIsoDate());
        $calendarReader->limit = 10;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText($calendarReader->model->date->label);
        $header->addText($calendarReader->model->time->label);
        $header->addText($calendarReader->model->event->label);

        foreach ($calendarReader->getData() as $calendarRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($calendarRow->date->getShortDateLeadingZeroFormat());
            $row->addText($calendarRow->time->getTimeLeadingZero());
            $row->addText($calendarRow->event);

            //$site = clone(CalendarSite::$site);
            $site = clone(CalendarItemSite::$site);
            $site->addParameter(new CalendarParameter($calendarRow->id));
            $row->addClickableSite($site);

        }

        return parent::getContent();
    }
}