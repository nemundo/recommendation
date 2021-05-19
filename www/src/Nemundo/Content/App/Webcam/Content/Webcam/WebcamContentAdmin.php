<?php


namespace Nemundo\Content\App\Webcam\Content\Webcam;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class WebcamContentAdmin extends AbstractContentAdmin
{


    protected function loadAdmin()
    {

        $this->contentType = new WebcamContentType();


    }


    protected function loadIndex()
    {

        $table = new AdminClickableTable($this);

        $reader = new WebcamPaginationReader();

        $header = new TableHeader($table);
        $header->addText($reader->model->webcam->label);
        $header->addText($reader->model->imageUrl->label);
        $header->addText($reader->model->imageCrawler->label);
        $header->addEmpty();
        $header->addEmpty();

        foreach ($reader->getData() as $webcamRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($webcamRow->webcam);
            $row->addText($webcamRow->imageUrl);
            $row->addYesNo($webcamRow->imageCrawler);

            $row->addClickableSite($this->getViewSite($webcamRow->id));
            $row->addIconSite($this->getEditSite($webcamRow->id));
            $row->addIconSite($this->getDeleteSite($webcamRow->id));

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $reader;

    }

}