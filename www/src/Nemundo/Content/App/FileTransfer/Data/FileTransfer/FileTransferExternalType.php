<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransferExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $fileTransfer;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FileTransferModel::class;
$this->externalTableName = "filetransfer_file_transfer";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->fileTransfer = new \Nemundo\Model\Type\Text\TextType();
$this->fileTransfer->fieldName = "file_transfer";
$this->fileTransfer->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileTransfer->externalTableName = $this->externalTableName;
$this->fileTransfer->aliasFieldName = $this->fileTransfer->tableName . "_" . $this->fileTransfer->fieldName;
$this->fileTransfer->label = "File Transfer";
$this->addType($this->fileTransfer);

}
}