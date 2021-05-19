<?php


namespace Nemundo\Content\App\File\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\File\Data\FileIndex\FileIndexReader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class FileParentTable extends AdminClickableTable
{

    public $parentId;

    public function getContent()
    {






        $header=new TableHeader($this);
        $header->addText('File');


        $reader=new FileIndexReader();
        $reader->model->loadFile();
        $reader->model->file->loadUser();
        $reader->filter->andEqual($reader->model->parentId,$this->parentId);
        foreach ($reader->getData() as $fileIndexRow) {

            $row=new BootstrapClickableTableRow($this);
            $row->addText($fileIndexRow->file->file->getFilename());
            $row->addText($fileIndexRow->file->user->displayName);
            $row->addText($fileIndexRow->file->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addClickableUrl($fileIndexRow->file->file->getUrl());


        }



        return parent::getContent();
    }

}