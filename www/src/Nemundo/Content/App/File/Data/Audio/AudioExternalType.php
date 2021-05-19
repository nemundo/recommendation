<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AudioModel::class;
$this->externalTableName = "file_audio";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->audio = new \Nemundo\Model\Type\File\FileType();
$this->audio->fieldName = "audio";
$this->audio->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->audio->externalTableName = $this->externalTableName;
$this->audio->aliasFieldName = $this->audio->tableName . "_" . $this->audio->fieldName;
$this->audio->label = "Audio";
$this->addType($this->audio);

$this->length = new \Nemundo\Model\Type\Number\NumberType();
$this->length->fieldName = "length";
$this->length->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->length->externalTableName = $this->externalTableName;
$this->length->aliasFieldName = $this->length->tableName . "_" . $this->length->fieldName;
$this->length->label = "Length";
$this->addType($this->length);

$this->orginalFilename = new \Nemundo\Model\Type\Text\TextType();
$this->orginalFilename->fieldName = "orginal_filename";
$this->orginalFilename->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->orginalFilename->externalTableName = $this->externalTableName;
$this->orginalFilename->aliasFieldName = $this->orginalFilename->tableName . "_" . $this->orginalFilename->fieldName;
$this->orginalFilename->label = "Orginal Filename";
$this->addType($this->orginalFilename);

}
}