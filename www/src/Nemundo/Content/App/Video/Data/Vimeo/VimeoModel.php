<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class VimeoModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $vimeoId;

protected function loadModel() {
$this->tableName = "video_vimeo";
$this->aliasTableName = "video_vimeo";
$this->label = "Vimeo";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "video_vimeo";
$this->id->externalTableName = "video_vimeo";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "video_vimeo_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->vimeoId = new \Nemundo\Model\Type\Text\TextType($this);
$this->vimeoId->tableName = "video_vimeo";
$this->vimeoId->externalTableName = "video_vimeo";
$this->vimeoId->fieldName = "vimeo_id";
$this->vimeoId->aliasFieldName = "video_vimeo_vimeo_id";
$this->vimeoId->label = "Vimeo Id";
$this->vimeoId->allowNullValue = true;
$this->vimeoId->length = 50;

}
}