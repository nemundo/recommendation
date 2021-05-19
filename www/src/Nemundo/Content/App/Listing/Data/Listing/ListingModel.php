<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
class ListingModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "listing_listing";
$this->aliasTableName = "listing_listing";
$this->label = "Listing";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "listing_listing";
$this->id->externalTableName = "listing_listing";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "listing_listing_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

}
}