<?php
namespace Nemundo\Content\App\Podcast\Data\Podcast;
class PodcastExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $rssUrl;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $podcast;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PodcastModel::class;
$this->externalTableName = "podcast_podcast";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->rssUrl = new \Nemundo\Model\Type\Text\TextType();
$this->rssUrl->fieldName = "rss_url";
$this->rssUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->rssUrl->externalTableName = $this->externalTableName;
$this->rssUrl->aliasFieldName = $this->rssUrl->tableName . "_" . $this->rssUrl->fieldName;
$this->rssUrl->label = "Rss Url";
$this->addType($this->rssUrl);

$this->podcast = new \Nemundo\Model\Type\Text\TextType();
$this->podcast->fieldName = "podcast";
$this->podcast->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->podcast->externalTableName = $this->externalTableName;
$this->podcast->aliasFieldName = $this->podcast->tableName . "_" . $this->podcast->fieldName;
$this->podcast->label = "Podcast";
$this->addType($this->podcast);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

}
}