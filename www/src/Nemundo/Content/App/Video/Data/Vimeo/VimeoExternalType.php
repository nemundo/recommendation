<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class VimeoExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $vimeoId;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = VimeoModel::class;
$this->externalTableName = "video_vimeo";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->vimeoId = new \Nemundo\Model\Type\Text\TextType();
$this->vimeoId->fieldName = "vimeo_id";
$this->vimeoId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->vimeoId->externalTableName = $this->externalTableName;
$this->vimeoId->aliasFieldName = $this->vimeoId->tableName . "_" . $this->vimeoId->fieldName;
$this->vimeoId->label = "Vimeo Id";
$this->addType($this->vimeoId);

}
}