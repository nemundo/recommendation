<?php
namespace Nemundo\Content\App\FileTransfer\Data\File;
class FileModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $fileTransferId;

/**
* @var \Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferExternalType
*/
public $fileTransfer;

/**
* @var \Nemundo\Model\Type\File\RedirectFilenameType
*/
public $file;

protected function loadModel() {
$this->tableName = "filetransfer_file";
$this->aliasTableName = "filetransfer_file";
$this->label = "File";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "filetransfer_file";
$this->id->externalTableName = "filetransfer_file";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "filetransfer_file_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->fileTransferId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->fileTransferId->tableName = "filetransfer_file";
$this->fileTransferId->fieldName = "file_transfer";
$this->fileTransferId->aliasFieldName = "filetransfer_file_file_transfer";
$this->fileTransferId->label = "File Transfer";
$this->fileTransferId->allowNullValue = false;

$this->file = new \Nemundo\Model\Type\File\RedirectFilenameType($this);
$this->file->tableName = "filetransfer_file";
$this->file->externalTableName = "filetransfer_file";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "filetransfer_file_file";
$this->file->label = "File";
$this->file->allowNullValue = false;
$this->file->redirectSite = \Nemundo\Content\App\FileTransfer\Data\File\Redirect\FileRedirectConfig::$redirectFileFileSite;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "file_transfer";
$index->addType($this->fileTransferId);

}
public function loadFileTransfer() {
if ($this->fileTransfer == null) {
$this->fileTransfer = new \Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferExternalType($this, "filetransfer_file_file_transfer");
$this->fileTransfer->tableName = "filetransfer_file";
$this->fileTransfer->fieldName = "file_transfer";
$this->fileTransfer->aliasFieldName = "filetransfer_file_file_transfer";
$this->fileTransfer->label = "File Transfer";
}
return $this;
}
}