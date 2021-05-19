<?php
namespace Nemundo\Content\App\FileTransfer\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class FileTransferModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\FileTransfer\Data\File\FileModel());
$this->addModel(new \Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferModel());
}
}