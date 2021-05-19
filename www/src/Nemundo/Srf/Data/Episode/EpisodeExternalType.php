<?php
namespace Nemundo\Srf\Data\Episode;
class EpisodeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $showId;

/**
* @var \Nemundo\Srf\Data\Show\ShowExternalType
*/
public $show;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $urn;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $length;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = EpisodeModel::class;
$this->externalTableName = "srf_episode";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->showId = new \Nemundo\Model\Type\Id\IdType();
$this->showId->fieldName = "show";
$this->showId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->showId->aliasFieldName = $this->showId->tableName ."_".$this->showId->fieldName;
$this->showId->label = "Show";
$this->addType($this->showId);

$this->urn = new \Nemundo\Model\Type\Text\TextType();
$this->urn->fieldName = "urn";
$this->urn->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->urn->externalTableName = $this->externalTableName;
$this->urn->aliasFieldName = $this->urn->tableName . "_" . $this->urn->fieldName;
$this->urn->label = "Urn";
$this->addType($this->urn);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->externalTableName = $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->length = new \Nemundo\Model\Type\Number\NumberType();
$this->length->fieldName = "length";
$this->length->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->length->externalTableName = $this->externalTableName;
$this->length->aliasFieldName = $this->length->tableName . "_" . $this->length->fieldName;
$this->length->label = "Length";
$this->addType($this->length);

}
public function loadShow() {
if ($this->show == null) {
$this->show = new \Nemundo\Srf\Data\Show\ShowExternalType(null, $this->parentFieldName . "_show");
$this->show->fieldName = "show";
$this->show->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->show->aliasFieldName = $this->show->tableName ."_".$this->show->fieldName;
$this->show->label = "Show";
$this->addType($this->show);
}
return $this;
}
}