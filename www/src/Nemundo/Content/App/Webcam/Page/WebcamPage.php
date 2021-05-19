<?php

namespace Nemundo\Content\App\Webcam\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Content\App\Webcam\Template\WebcamTemplate;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class WebcamPage extends WebcamTemplate
{

    public function getContent()
    {

        /*$contentType = new WebcamContentType();
        $contentType->getForm($this);*/

        $table = new AdminClickableTable($this);

        $reader = new WebcamPaginationReader();

        $header = new TableHeader($table);
        $header->addText($reader->model->webcam->label);
        $header->addText($reader->model->imageUrl->label);

        foreach ($reader->getData() as $webcamRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($webcamRow->webcam);

            $img=new BootstrapResponsiveImage($row);
            $img->src=$webcamRow->imageUrl;

            if ($webcamRow->imageCrawler) {
                $row->addClickableSite($webcamRow->getWebcamContentType()->getViewSite());
            }

            //$row->addText($webcamRow->imageUrl);
        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $reader;

        return parent::getContent();

    }

}