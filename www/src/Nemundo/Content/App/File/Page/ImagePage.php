<?php

namespace Nemundo\Content\App\File\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Favorite\Action\FavoriteSaveContentAction;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\App\File\Data\Image\ImagePaginationReader;
use Nemundo\Content\App\File\Template\FileTemplate;
use Nemundo\Content\App\Inbox\Action\SendToContentAction;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ImagePage extends FileTemplate
{
    public function getContent()
    {


        (new ImageContentType())->getDefaultForm($this);


        $imageReader = new ImagePaginationReader();
        $imageReader->addOrder($imageReader->model->id, SortOrder::DESCENDING);

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText($imageReader->model->image->label);
        $header->addText($imageReader->model->fileSize->label);
        $header->addText($imageReader->model->fileExtension->label);
        $header->addText($imageReader->model->imageWidth->label);
        $header->addText($imageReader->model->imageHeight->label);

        foreach ($imageReader->getData() as $imageRow) {

            $row = new BootstrapClickableTableRow($table);

            $img = new BootstrapResponsiveImage($row);
            $img->src = $imageRow->image->getImageUrl($imageReader->model->imageAutoSize400);
            $img->width = 300;

            $row->addText($imageRow->fileSize);
            $row->addText($imageRow->fileExtension);
            $row->addText($imageRow->imageWidth);
            $row->addText($imageRow->imageHeight);

            $imageContentType = new ImageContentType($imageRow->id);

            $dropdown=new ContentActionDropdown($row);
            $dropdown->contentId = $imageContentType->getContentId();
            //$dropdown->addContentAction(new FavoriteSaveContentAction());
            //$dropdown->addContentAction(new SendToContentAction());


        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $imageReader;


        return parent::getContent();

    }
}