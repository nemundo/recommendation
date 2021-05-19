<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "file_video";
$this->aliasTableName = "file_video";
$this->label = "Video";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_video";
$this->id->externalTableName = "file_video";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_video_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->video = new \Nemundo\Model\Type\File\FileType($this);
$this->video->tableName = "file_video";
$this->video->externalTableName = "file_video";
$this->video->fieldName = "video";
$this->video->aliasFieldName = "file_video_video";
$this->video->label = "Video";
$this->video->allowNullValue = true;

$this->orginalFilename = new \Nemundo\Model\Type\Text\TextType($this);
$this->orginalFilename->tableName = "file_video";
$this->orginalFilename->externalTableName = "file_video";
$this->orginalFilename->fieldName = "orginal_filename";
$this->orginalFilename->aliasFieldName = "file_video_orginal_filename";
$this->orginalFilename->label = "Orginal Filename";
$this->orginalFilename->allowNullValue = true;
$this->orginalFilename->length = 255;

}
}