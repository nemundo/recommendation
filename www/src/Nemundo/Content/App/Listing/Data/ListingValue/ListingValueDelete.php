<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValueDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ListingValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingValueModel();
}
}