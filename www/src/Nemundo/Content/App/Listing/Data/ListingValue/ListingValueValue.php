<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValueValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ListingValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingValueModel();
}
}