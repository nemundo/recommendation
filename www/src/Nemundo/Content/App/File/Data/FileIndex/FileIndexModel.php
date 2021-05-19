<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $parentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $parent;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $fileId;

/**
* @var \Nemundo\Content\App\File\Data\File\FileExternalType
*/
public $file;

protected function loadModel() {
$this->tableName = "file_file_index";
$this->aliasTableName = "file_file_index";
$this->label = "File Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_file_index";
$this->id->externalTableName = "file_file_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_file_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->parentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->parentId->tableName = "file_file_index";
$this->parentId->fieldName = "parent";
$this->parentId->aliasFieldName = "file_file_index_parent";
$this->parentId->label = "Parent";
$this->parentId->allowNullValue = true;

$this->fileId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->fileId->tableName = "file_file_index";
$this->fileId->fieldName = "file";
$this->fileId->aliasFieldName = "file_file_index_file";
$this->fileId->label = "File";
$this->fileId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "parent";
$index->addType($this->parentId);

}
public function loadParent() {
if ($this->parent == null) {
$this->parent = new \Nemundo\Content\Data\Content\ContentExternalType($this, "file_file_index_parent");
$this->parent->tableName = "file_file_index";
$this->parent->fieldName = "parent";
$this->parent->aliasFieldName = "file_file_index_parent";
$this->parent->label = "Parent";
}
return $this;
}
public function loadFile() {
if ($this->file == null) {
$this->file = new \Nemundo\Content\App\File\Data\File\FileExternalType($this, "file_file_index_file");
$this->file->tableName = "file_file_index";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "file_file_index_file";
$this->file->label = "File";
}
return $this;
}
}