<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $video;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $orginalFilename;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = VideoModel::class;
$this->externalTableName = "file_video";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->video = new \Nemundo\Model\Type\File\FileType();
$this->video->fieldName = "video";
$this->video->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->video->externalTableName = $this->externalTableName;
$this->video->aliasFieldName = $this->video->tableName . "_" . $this->video->fieldName;
$this->video->label = "Video";
$this->addType($this->video);

$this->orginalFilename = new \Nemundo\Model\Type\Text\TextType();
$this->orginalFilename->fieldName = "orginal_filename";
$this->orginalFilename->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->orginalFilename->externalTableName = $this->externalTableName;
$this->orginalFilename->aliasFieldName = $this->orginalFilename->tableName . "_" . $this->orginalFilename->fieldName;
$this->orginalFilename->label = "Orginal Filename";
$this->addType($this->orginalFilename);

}
}