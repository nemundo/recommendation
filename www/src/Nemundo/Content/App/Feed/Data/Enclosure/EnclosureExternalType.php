<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosureExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $feedItemId;

/**
* @var \Nemundo\Content\App\Feed\Data\FeedItem\FeedItemExternalType
*/
public $feedItem;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = EnclosureModel::class;
$this->externalTableName = "feed_enclosure";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->feedItemId = new \Nemundo\Model\Type\Id\IdType();
$this->feedItemId->fieldName = "feed_item";
$this->feedItemId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->feedItemId->aliasFieldName = $this->feedItemId->tableName ."_".$this->feedItemId->fieldName;
$this->feedItemId->label = "Feed Item";
$this->addType($this->feedItemId);

}
public function loadFeedItem() {
if ($this->feedItem == null) {
$this->feedItem = new \Nemundo\Content\App\Feed\Data\FeedItem\FeedItemExternalType(null, $this->parentFieldName . "_feed_item");
$this->feedItem->fieldName = "feed_item";
$this->feedItem->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->feedItem->aliasFieldName = $this->feedItem->tableName ."_".$this->feedItem->fieldName;
$this->feedItem->label = "Feed Item";
$this->addType($this->feedItem);
}
return $this;
}
}