<?php

namespace Nemundo\Content\App\ImageTimeline\Page\Admin;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\ImageTimeline\Com\ListBox\ImageTimelineListBox;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelinePaginationReader;
use Nemundo\Content\App\ImageTimeline\Parameter\ImageTimelineParameter;
use Nemundo\Content\App\ImageTimeline\Site\Admin\ImageTimelineDeleteSite;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ImageTimelineAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $table = new AdminClickableTable($layout->col1);

        $reader = new ImageTimelinePaginationReader();

        $header=new AdminTableHeader($table);
        $header->addText($reader->model->timeline->label);
        $header->addText($reader->model->imageUrl->label);
        $header->addEmpty();

        foreach ($reader->getData() as $imageTimelineRow) {

            $row=new AdminTableRow($table);
            $row->addText($imageTimelineRow->timeline);
            $row->addText($imageTimelineRow->imageUrl);

            $site = clone(ImageTimelineDeleteSite::$site);
            $site->addParameter(new ImageTimelineParameter($imageTimelineRow->id));
            $row->addIconSite($site);


        }


        (new ImageTimelineContentType())->getDefaultForm($layout->col2);



        return parent::getContent();

    }

}