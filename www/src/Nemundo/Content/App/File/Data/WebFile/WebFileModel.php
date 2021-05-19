<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFileModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $file;

protected function loadModel() {
$this->tableName = "file_web_file";
$this->aliasTableName = "file_web_file";
$this->label = "Web File";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_web_file";
$this->id->externalTableName = "file_web_file";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_web_file_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->file = new \Nemundo\Model\Type\File\FileType($this);
$this->file->tableName = "file_web_file";
$this->file->externalTableName = "file_web_file";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "file_web_file_file";
$this->file->label = "File";
$this->file->allowNullValue = false;

}
}