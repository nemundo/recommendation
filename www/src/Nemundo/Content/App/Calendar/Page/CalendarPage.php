<?php


namespace Nemundo\Content\App\Calendar\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Action\DeleteContentAction;
use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\Action\ViewContentAction;
use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Data\Calendar\CalendarPaginationReader;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Content\App\Calendar\Template\CalendarTemplate;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Action\ChildOrder\ChildOrderContentAction;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class CalendarPage extends CalendarTemplate
{

    public function getContent()
    {


        /*
        $formSearch = new SearchForm($page);

        $formRow = new BootstrapRow($formSearch);

        $sourceType = new BootstrapListBox($formRow);
        $sourceType->label = 'Quelle';
        $sourceType->submitOnChange = true;
        $sourceType->searchMode = true;

        $reader = new CalendarSourceTypeReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $sourceTypeRow) {
            $sourceType->addItem($sourceTypeRow->contentTypeId, $sourceTypeRow->contentType->contentType);
        }*/

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 4;
        $layout->col2->columnWidth = 8;


        $calendarReader = new CalendarPaginationReader();
        $calendarReader->addOrder($calendarReader->model->date);
        //$reader->paginationLimit = ProcessConfig::PAGINATION_LIMIT;

        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText($calendarReader->model->date->label);
        $header->addText($calendarReader->model->time->label);
        $header->addText($calendarReader->model->event->label);

        $calendarId = (new CalendarParameter())->getValue();

        foreach ($calendarReader->getData() as $calendarRow) {

            $row = new AdminClickableTableRow($table);

            if ($calendarRow->id == $calendarId) {
                $row->setActiveRow();
            }

            $row->addText($calendarRow->date->getShortDateLeadingZeroFormat());
            $row->addText($calendarRow->time->getTimeLeadingZero());
            $row->addText($calendarRow->event);

            $site = clone(CalendarSite::$site);
            $site->addParameter(new CalendarParameter($calendarRow->id));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $calendarReader;


        $parameter = new CalendarParameter();
        if ($parameter->hasValue()) {


            $calendarContent = new CalendarContentType($parameter->getValue());

            $widget = new ContentWidget($layout->col2);
            $widget->contentType = $calendarContent;
            $widget->actionDropdown->addContentAction(new EditContentAction());
            $widget->actionDropdown->addContentAction(new ChildOrderContentAction());
            $widget->actionDropdown->addContentAction(new ViewContentAction());
            $widget->actionDropdown->addContentAction(new PublicShareAction());
            $widget->actionDropdown->addSeperator();
            $widget->actionDropdown->addContentAction(new DeleteContentAction());


            /* $container = new TreeAdminContainer($layout->col2);
             $container->contentType = $calendarContent;*/


        }

        return parent::getContent();

    }


}