<?php
namespace Nemundo\Content\App\FileTransfer\Data\File;
class FileExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FileModel::class;
$this->externalTableName = "filetransfer_file";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->fileTransferId = new \Nemundo\Model\Type\Id\IdType();
$this->fileTransferId->fieldName = "file_transfer";
$this->fileTransferId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileTransferId->aliasFieldName = $this->fileTransferId->tableName ."_".$this->fileTransferId->fieldName;
$this->fileTransferId->label = "File Transfer";
$this->addType($this->fileTransferId);

$this->file = new \Nemundo\Model\Type\File\RedirectFilenameType();
$this->file->fieldName = "file";
$this->file->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->file->externalTableName = $this->externalTableName;
$this->file->aliasFieldName = $this->file->tableName . "_" . $this->file->fieldName;
$this->file->label = "File";
$this->file->redirectSite = \Nemundo\Content\App\FileTransfer\Data\File\Redirect\FileRedirectConfig::$redirectFileFileSite;
$this->file->createObject();
$this->addType($this->file);

}
public function loadFileTransfer() {
if ($this->fileTransfer == null) {
$this->fileTransfer = new \Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferExternalType(null, $this->parentFieldName . "_file_transfer");
$this->fileTransfer->fieldName = "file_transfer";
$this->fileTransfer->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileTransfer->aliasFieldName = $this->fileTransfer->tableName ."_".$this->fileTransfer->fieldName;
$this->fileTransfer->label = "File Transfer";
$this->addType($this->fileTransfer);
}
return $this;
}
}