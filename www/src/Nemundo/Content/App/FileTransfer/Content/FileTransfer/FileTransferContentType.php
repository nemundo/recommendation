<?php

namespace Nemundo\Content\App\FileTransfer\Content\FileTransfer;

use Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransfer;
use Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferReader;
use Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferRow;
use Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferUpdate;
use Nemundo\Content\Type\AbstractContentType;


class FileTransferContentType extends AbstractContentType
{

    public $fileTransfer;


    protected function loadContentType()
    {
        $this->typeLabel = 'File Transfer';
        $this->typeId = 'e69c4f3c-89cb-4107-854c-575d46d5637d';
        $this->formClassList[] = FileTransferContentForm::class;
        $this->viewClassList[]  = FileTransferContentView::class;
    }

    protected function onCreate()
    {

        $data = new FileTransfer();
        $data->fileTransfer = $this->fileTransfer;
        $this->dataId = $data->save();


    }

    protected function onUpdate()
    {

        $update = new FileTransferUpdate();
        $update->fileTransfer = $this->fileTransfer;
         $update->updateById($this->dataId);


    }

    protected function onDataRow()
    {
        $this->dataRow = (new FileTransferReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|FileTransferRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }

    public function getSubject()
    {
        return $this->getDataRow()->fileTransfer;
    }


}