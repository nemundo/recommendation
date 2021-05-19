<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFileExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $file;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WebFileModel::class;
$this->externalTableName = "file_web_file";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->file = new \Nemundo\Model\Type\File\FileType();
$this->file->fieldName = "file";
$this->file->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->file->externalTableName = $this->externalTableName;
$this->file->aliasFieldName = $this->file->tableName . "_" . $this->file->fieldName;
$this->file->label = "File";
$this->addType($this->file);

}
}