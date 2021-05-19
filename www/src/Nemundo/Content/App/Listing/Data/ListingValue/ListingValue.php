<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValue extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ListingValueModel
*/
protected $model;

/**
* @var string
*/
public $listingId;

/**
* @var string
*/
public $value;

public function __construct() {
parent::__construct();
$this->model = new ListingValueModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->listingId, $this->listingId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$id = parent::save();
return $id;
}
}