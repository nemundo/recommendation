<?php


namespace Nemundo\Content\App\Calendar\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Calendar\Data\CalendarIndex\CalendarIndexPaginationReader;
use Nemundo\Content\App\Calendar\Data\CalendarIndex\CalendarIndexReader;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Content\Index\Group\User\GroupMembership;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Db\Filter\Filter;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class CalendarWidget extends AbstractAdminWidget
{

    public function getContent()
    {

        $this->widgetTitle='Calendar';
        $this->widgetSite=CalendarSite::$site;

        $reader = new CalendarIndexReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();

        $reader->filter->andEqualOrGreater($reader->model->date, (new Date())->setNow()->getIsoDate());

/*
        $groupFilter = new Filter();
        foreach ((new GroupMembership())->getGroupIdList() as $groupId) {
            $groupFilter->orEqual($reader->model->groupId,$groupId);
        }
        $groupFilter->orIsNull($reader->model->groupId);

        $reader->filter->andFilter($groupFilter);*/


        $groupFilter=(new GroupMembership())->getGroupFilter($reader->model->groupId);
        $reader->filter->andFilter($groupFilter);



        $reader->addOrder($reader->model->date);
        $reader->limit=10;
        //$reader->paginationLimit = ProcessConfig::PAGINATION_LIMIT;

        $table = new AdminClickableTable($this);

        //$div = new Div($page);

        $header = new TableHeader($table);
        $header->addText($reader->model->date->label);
        $header->addText($reader->model->title->label);
        /*$header->addText('View');
        $header->addText('Type');
        $header->addText('Source');*/
        $header->addText('Source Type');

        foreach ($reader->getData() as $calendarIndexRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($calendarIndexRow->date->getShortDateLeadingZeroFormat());
            $row->addText($calendarIndexRow->title);
            $row->addText($calendarIndexRow->content->contentType->contentType);

            /*
            $type = $calendarIndexRow->content->getContentType();
            $type->getView($row);

            $row->addText($type->typeLabel);

            $row->addClickableSite($type->getViewSite());*/


            $site=clone(CalendarSite::$site);
            $site->addParameter(new CalendarParameter($calendarIndexRow->id));
            $row->addClickableSite($site);

        }



        return parent::getContent();

    }

}