<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransferRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FileTransferModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $fileTransfer;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->fileTransfer = $this->getModelValue($model->fileTransfer);
}
}