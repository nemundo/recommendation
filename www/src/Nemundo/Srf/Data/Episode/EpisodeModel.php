<?php
namespace Nemundo\Srf\Data\Episode;
class EpisodeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "srf_episode";
$this->aliasTableName = "srf_episode";
$this->label = "Episode";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "srf_episode";
$this->id->externalTableName = "srf_episode";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "srf_episode_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->showId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->showId->tableName = "srf_episode";
$this->showId->fieldName = "show";
$this->showId->aliasFieldName = "srf_episode_show";
$this->showId->label = "Show";
$this->showId->allowNullValue = false;

$this->urn = new \Nemundo\Model\Type\Text\TextType($this);
$this->urn->tableName = "srf_episode";
$this->urn->externalTableName = "srf_episode";
$this->urn->fieldName = "urn";
$this->urn->aliasFieldName = "srf_episode_urn";
$this->urn->label = "Urn";
$this->urn->allowNullValue = false;
$this->urn->length = 255;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "srf_episode";
$this->title->externalTableName = "srf_episode";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "srf_episode_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "srf_episode";
$this->description->externalTableName = "srf_episode";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "srf_episode_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "srf_episode";
$this->dateTime->externalTableName = "srf_episode";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "srf_episode_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->length = new \Nemundo\Model\Type\Number\NumberType($this);
$this->length->tableName = "srf_episode";
$this->length->externalTableName = "srf_episode";
$this->length->fieldName = "length";
$this->length->aliasFieldName = "srf_episode_length";
$this->length->label = "Length";
$this->length->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "srf_id";
$index->addType($this->urn);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "date_time";
$index->addType($this->dateTime);

}
public function loadShow() {
if ($this->show == null) {
$this->show = new \Nemundo\Srf\Data\Show\ShowExternalType($this, "srf_episode_show");
$this->show->tableName = "srf_episode";
$this->show->fieldName = "show";
$this->show->aliasFieldName = "srf_episode_show";
$this->show->label = "Show";
}
return $this;
}
}