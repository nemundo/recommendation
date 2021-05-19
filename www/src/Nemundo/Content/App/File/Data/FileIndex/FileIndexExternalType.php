<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $parentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $parent;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $fileId;

/**
* @var \Nemundo\Content\App\File\Data\File\FileExternalType
*/
public $file;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FileIndexModel::class;
$this->externalTableName = "file_file_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->parentId = new \Nemundo\Model\Type\Id\IdType();
$this->parentId->fieldName = "parent";
$this->parentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->parentId->aliasFieldName = $this->parentId->tableName ."_".$this->parentId->fieldName;
$this->parentId->label = "Parent";
$this->addType($this->parentId);

$this->fileId = new \Nemundo\Model\Type\Id\IdType();
$this->fileId->fieldName = "file";
$this->fileId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileId->aliasFieldName = $this->fileId->tableName ."_".$this->fileId->fieldName;
$this->fileId->label = "File";
$this->addType($this->fileId);

}
public function loadParent() {
if ($this->parent == null) {
$this->parent = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_parent");
$this->parent->fieldName = "parent";
$this->parent->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->parent->aliasFieldName = $this->parent->tableName ."_".$this->parent->fieldName;
$this->parent->label = "Parent";
$this->addType($this->parent);
}
return $this;
}
public function loadFile() {
if ($this->file == null) {
$this->file = new \Nemundo\Content\App\File\Data\File\FileExternalType(null, $this->parentFieldName . "_file");
$this->file->fieldName = "file";
$this->file->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->file->aliasFieldName = $this->file->tableName ."_".$this->file->fieldName;
$this->file->label = "File";
$this->addType($this->file);
}
return $this;
}
}