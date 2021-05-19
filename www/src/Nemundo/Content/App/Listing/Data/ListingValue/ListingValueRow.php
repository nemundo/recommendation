<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValueRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ListingValueModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $listingId;

/**
* @var \Nemundo\Content\App\Listing\Data\Listing\ListingRow
*/
public $listing;

/**
* @var string
*/
public $value;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->listingId = intval($this->getModelValue($model->listingId));
if ($model->listing !== null) {
$this->loadNemundoContentAppListingDataListingListinglistingRow($model->listing);
}
$this->value = $this->getModelValue($model->value);
}
private function loadNemundoContentAppListingDataListingListinglistingRow($model) {
$this->listing = new \Nemundo\Content\App\Listing\Data\Listing\ListingRow($this->row, $model);
}
}