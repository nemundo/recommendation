<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValueModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $listingId;

/**
* @var \Nemundo\Content\App\Listing\Data\Listing\ListingExternalType
*/
public $listing;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $value;

protected function loadModel() {
$this->tableName = "listing_listing_value";
$this->aliasTableName = "listing_listing_value";
$this->label = "Listing Value";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "listing_listing_value";
$this->id->externalTableName = "listing_listing_value";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "listing_listing_value_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->listingId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->listingId->tableName = "listing_listing_value";
$this->listingId->fieldName = "listing";
$this->listingId->aliasFieldName = "listing_listing_value_listing";
$this->listingId->label = "Listing";
$this->listingId->allowNullValue = true;

$this->value = new \Nemundo\Model\Type\Text\TextType($this);
$this->value->tableName = "listing_listing_value";
$this->value->externalTableName = "listing_listing_value";
$this->value->fieldName = "value";
$this->value->aliasFieldName = "listing_listing_value_value";
$this->value->label = "Value";
$this->value->allowNullValue = true;
$this->value->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "listing";
$index->addType($this->listingId);

}
public function loadListing() {
if ($this->listing == null) {
$this->listing = new \Nemundo\Content\App\Listing\Data\Listing\ListingExternalType($this, "listing_listing_value_listing");
$this->listing->tableName = "listing_listing_value";
$this->listing->fieldName = "listing";
$this->listing->aliasFieldName = "listing_listing_value_listing";
$this->listing->label = "Listing";
}
return $this;
}
}