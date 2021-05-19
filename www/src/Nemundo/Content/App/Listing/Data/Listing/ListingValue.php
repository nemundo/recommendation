<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
class ListingValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ListingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingModel();
}
}