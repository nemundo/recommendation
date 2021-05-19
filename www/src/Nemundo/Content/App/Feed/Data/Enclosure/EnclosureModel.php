<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosureModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $feedItemId;

/**
* @var \Nemundo\Content\App\Feed\Data\FeedItem\FeedItemExternalType
*/
public $feedItem;

protected function loadModel() {
$this->tableName = "feed_enclosure";
$this->aliasTableName = "feed_enclosure";
$this->label = "Enclosure";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "feed_enclosure";
$this->id->externalTableName = "feed_enclosure";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "feed_enclosure_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->feedItemId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->feedItemId->tableName = "feed_enclosure";
$this->feedItemId->fieldName = "feed_item";
$this->feedItemId->aliasFieldName = "feed_enclosure_feed_item";
$this->feedItemId->label = "Feed Item";
$this->feedItemId->allowNullValue = true;

}
public function loadFeedItem() {
if ($this->feedItem == null) {
$this->feedItem = new \Nemundo\Content\App\Feed\Data\FeedItem\FeedItemExternalType($this, "feed_enclosure_feed_item");
$this->feedItem->tableName = "feed_enclosure";
$this->feedItem->fieldName = "feed_item";
$this->feedItem->aliasFieldName = "feed_enclosure_feed_item";
$this->feedItem->label = "Feed Item";
}
return $this;
}
}