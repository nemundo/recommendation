<?php

namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\View\ImageGalleryContentView;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\View\ImageGalleryStreamContentView;
use Nemundo\Content\App\ImageGallery\Data\Image\Image;
use Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGallery;
use Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryReader;
use Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryRow;
use Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Content\View\Listing\ContentListing;
use Nemundo\Model\Data\Property\File\FileProperty;

class ImageGalleryContentListing extends AbstractContentListing
{

   public function getContent()
   {


       $table=new AdminTable($this);

       $reader=new ImageGalleryReader();
       foreach ($reader->getData() as $imageGalleryRow) {

           $row=new TableRow($table);
           $row->addText($imageGalleryRow->imageGallery);

       }



       return parent::getContent(); // TODO: Change the autogenerated stub
   }


}