<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $audio;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $length;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $orginalFilename;

protected function loadModel() {
$this->tableName = "file_audio";
$this->aliasTableName = "file_audio";
$this->label = "Audio";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_audio";
$this->id->externalTableName = "file_audio";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_audio_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->audio = new \Nemundo\Model\Type\File\FileType($this);
$this->audio->tableName = "file_audio";
$this->audio->externalTableName = "file_audio";
$this->audio->fieldName = "audio";
$this->audio->aliasFieldName = "file_audio_audio";
$this->audio->label = "Audio";
$this->audio->allowNullValue = true;

$this->length = new \Nemundo\Model\Type\Number\NumberType($this);
$this->length->tableName = "file_audio";
$this->length->externalTableName = "file_audio";
$this->length->fieldName = "length";
$this->length->aliasFieldName = "file_audio_length";
$this->length->label = "Length";
$this->length->allowNullValue = true;

$this->orginalFilename = new \Nemundo\Model\Type\Text\TextType($this);
$this->orginalFilename->tableName = "file_audio";
$this->orginalFilename->externalTableName = "file_audio";
$this->orginalFilename->fieldName = "orginal_filename";
$this->orginalFilename->aliasFieldName = "file_audio_orginal_filename";
$this->orginalFilename->label = "Orginal Filename";
$this->orginalFilename->allowNullValue = true;
$this->orginalFilename->length = 255;

}
}