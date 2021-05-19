<?php

namespace Nemundo\Content\App\Timeline\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelinePaginationReader;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelineReader;
use Nemundo\Content\App\Timeline\Site\ClearSite;
use Nemundo\Content\App\Timeline\Site\ItemSite;
use Nemundo\Content\App\Timeline\Site\TimelineSite;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class TimelinePage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $dateFromTo = new BootstrapFromToDatePicker($formRow);
        $dateFromTo->searchMode = true;
        $dateFromTo->column=true;
        $dateFromTo->columnSize= 2;


        $source = new BootstrapListBox($formRow);
        $source->name = (new ContentTypeParameter())->getParameterName();
        $source->label = 'Source';
        $source->submitOnChange = true;
        $source->searchMode = true;
        $source->column=true;
        $source->columnSize= 2;

        $reader = new TimelineReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        $reader->addGroup($reader->model->content->contentTypeId);

        $count = new CountField($reader);

        foreach ($reader->getData() as $timelineRow) {

            $label = $timelineRow->content->contentType->contentType . ' (' . $timelineRow->getModelValue($count) . ')';
            $source->addItem($timelineRow->content->contentTypeId, $label);

        }

        new AdminSearchButton($formRow);

        $btn=new AdminIconSiteButton($formRow);
        $btn->site=ClearSite::$site;

        // ajax loading
        // search from to

        $layout = new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $reader = new TimelinePaginationReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();

        if ($dateFromTo->hasValueFrom()) {
            $reader->filter->andEqualOrGreater($reader->model->date, $dateFromTo->getDateFrom()->getIsoDate());
        }

        if ($dateFromTo->hasValueTo()) {
            $reader->filter->andEqualOrSmaller($reader->model->date, $dateFromTo->getDateTo()->getIsoDate());
        }

        if ($source->hasValue()) {
            $reader->filter->andEqual($reader->model->content->contentTypeId, $source->getValue());
        }

        $reader->addOrder($reader->model->dateTime, SortOrder::DESCENDING);

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->dateTime->label);
        $header->addText($reader->model->subject->label);
        $header->addText($reader->model->content->contentType->label);

        foreach ($reader->getData() as $timelineRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($timelineRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($timelineRow->subject);
            $row->addText($timelineRow->content->contentType->contentType);


            //$contentType = $timelineRow->content->getContentType();
            //$row->addText($contentType->getSubject());
            //$contentType->getDefaultView($row);

            $site = clone(TimelineSite::$site);
            $site->addParameter(new ContentParameter($timelineRow->contentId));
            $site->addParameter(new ContentTypeParameter());

            $row->addClickableSite($site);

        }


        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $reader;


        $contentParameter = new ContentParameter();
        if ($contentParameter->hasValue()) {

            $content = (new ContentParameter())->getContent(false);

            $widget=new ContentWidget($layout->col2);
            $widget->contentType = $content;
            $widget->loadAction=true;
            $widget->redirectSite= TimelineSite::$site;

            //$content->getDefaultView($this);

        }


        return parent::getContent();
    }
}