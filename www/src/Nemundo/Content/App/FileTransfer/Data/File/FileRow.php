<?php
namespace Nemundo\Content\App\FileTransfer\Data\File;
class FileRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FileModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $fileTransferId;

/**
* @var \Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferRow
*/
public $fileTransfer;

/**
* @var \Nemundo\Model\Reader\Property\File\RedirectFilenameReaderProperty
*/
public $file;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->fileTransferId = intval($this->getModelValue($model->fileTransferId));
if ($model->fileTransfer !== null) {
$this->loadNemundoContentAppFileTransferDataFileTransferFileTransferfileTransferRow($model->fileTransfer);
}
$this->file = new \Nemundo\Model\Reader\Property\File\RedirectFilenameReaderProperty($row, $model->file, $model->id);
}
private function loadNemundoContentAppFileTransferDataFileTransferFileTransferfileTransferRow($model) {
$this->fileTransfer = new \Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferRow($this->row, $model);
}
}