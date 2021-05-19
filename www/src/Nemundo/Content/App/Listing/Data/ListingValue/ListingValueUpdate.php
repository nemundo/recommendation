<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
use Nemundo\Model\Data\AbstractModelUpdate;
class ListingValueUpdate extends AbstractModelUpdate {
/**
* @var ListingValueModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->listingId, $this->listingId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
parent::update();
}
}