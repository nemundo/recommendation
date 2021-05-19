<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValueExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ListingValueModel::class;
$this->externalTableName = "listing_listing_value";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->listingId = new \Nemundo\Model\Type\Id\IdType();
$this->listingId->fieldName = "listing";
$this->listingId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->listingId->aliasFieldName = $this->listingId->tableName ."_".$this->listingId->fieldName;
$this->listingId->label = "Listing";
$this->addType($this->listingId);

$this->value = new \Nemundo\Model\Type\Text\TextType();
$this->value->fieldName = "value";
$this->value->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->value->externalTableName = $this->externalTableName;
$this->value->aliasFieldName = $this->value->tableName . "_" . $this->value->fieldName;
$this->value->label = "Value";
$this->addType($this->value);

}
public function loadListing() {
if ($this->listing == null) {
$this->listing = new \Nemundo\Content\App\Listing\Data\Listing\ListingExternalType(null, $this->parentFieldName . "_listing");
$this->listing->fieldName = "listing";
$this->listing->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->listing->aliasFieldName = $this->listing->tableName ."_".$this->listing->fieldName;
$this->listing->label = "Listing";
$this->addType($this->listing);
}
return $this;
}
}