<?php


namespace Nemundo\Content\App\Webcam\Content\Webcam;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Content\Index\Tree\Type\AbstractParentContentListing;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class WebcamContentList extends AbstractParentContentListing
{

    public function getContent()
    {

        $table = new AdminTable($this);

        $reader = new WebcamReader();

        $header = new TableHeader($table);
        $header->addText($reader->model->webcam->label);
        $header->addText($reader->model->imageUrl->label);

        foreach ($reader->getData() as $webcamRow) {
            $row = new TableRow($table);
            $row->addText($webcamRow->webcam);

            $img=new BootstrapResponsiveImage($row);
            $img->src=$webcamRow->imageUrl;

        }

        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}