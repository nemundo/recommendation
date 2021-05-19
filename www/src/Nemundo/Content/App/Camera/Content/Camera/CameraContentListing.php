<?php

namespace Nemundo\Content\App\Camera\Content\Camera;


use Nemundo\Admin\Com\Redefine\AdminSearchRedefine;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Sorting\AdminUpdDownSortingHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Camera\Com\Redefine\YearRedefine;
use Nemundo\Content\App\Camera\Data\Camera\CameraPaginationReader;
use Nemundo\Content\App\Camera\Data\Camera\CameraReader;
use Nemundo\Content\App\Camera\Parameter\YearParameter;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Core\File\FileSize;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Package\Bootstrap\Card\BootstrapCard;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Site\Site;

class CameraContentListing extends AbstractContentListing
{

    public function getContent()
    {


        $layout = new BootstrapTwoColumnLayout($this);


        $cameraReader = new CameraPaginationReader();

        $yearParameter = new YearParameter();
        if ($yearParameter->hasValue()) {
            $cameraReader->filter->andEqual($cameraReader->model->year, $yearParameter->getValue());
        }


        $table = new AdminTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText($cameraReader->model->camera->label);

        $sorting = new AdminUpdDownSortingHyperlink($header);
        $sorting->fieldType = $cameraReader->model->dateTime;
        $sorting->checkSorting($cameraReader);


        $header->addText($cameraReader->model->width->label);
        //$header->addText($cameraReader->model->dateTime->label);

        $header->addText($cameraReader->model->filesize->label);

        $header->addEmpty();


        foreach ($cameraReader->getData() as $cameraRow) {

            $row = new TableRow($table);
            $row->addText($cameraRow->camera);
            $row->addText($cameraRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($cameraRow->width . ' x ' . $cameraRow->height);
            $row->addText((new FileSize($cameraRow->filesize))->getText());

            $img = new BootstrapResponsiveImage($row);
            $img->src = $cameraRow->image->getImageUrl($cameraReader->model->imageAutoSize300);

            $img = new BootstrapResponsiveImage($row);
            $img->src = $cameraRow->image->getImageUrl($cameraReader->model->imageFixWidth100);




        }

        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $cameraReader;


        $card = new AdminSearchRedefine($layout->col2);  // new BootstrapCard($layout->col2);
        $card->searchTopic = 'Year';
        $card->hideAtStartup=false;


        // Clear


        // Redefine Card

        //$list = new BootstrapSiteList($card);

        $reader = new CameraReader();
        $reader->addGroup($reader->model->year);

        $count = new CountField($reader);

        foreach ($reader->getData() as $cameraRow) {
            $site = new Site();
            $site->title = $cameraRow->year;
            $site->addParameter(new YearParameter($cameraRow->year));
            $card->addItemSite($site, $cameraRow->getModelValue($count) );
            //$list->addSite($site);
        }

        return parent::getContent();

    }

}