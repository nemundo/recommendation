<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
class ListingCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ListingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingModel();
}
}