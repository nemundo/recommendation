<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransferModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $fileTransfer;

protected function loadModel() {
$this->tableName = "filetransfer_file_transfer";
$this->aliasTableName = "filetransfer_file_transfer";
$this->label = "File Transfer";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "filetransfer_file_transfer";
$this->id->externalTableName = "filetransfer_file_transfer";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "filetransfer_file_transfer_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->fileTransfer = new \Nemundo\Model\Type\Text\TextType($this);
$this->fileTransfer->tableName = "filetransfer_file_transfer";
$this->fileTransfer->externalTableName = "filetransfer_file_transfer";
$this->fileTransfer->fieldName = "file_transfer";
$this->fileTransfer->aliasFieldName = "filetransfer_file_transfer_file_transfer";
$this->fileTransfer->label = "File Transfer";
$this->fileTransfer->allowNullValue = true;
$this->fileTransfer->length = 255;

}
}