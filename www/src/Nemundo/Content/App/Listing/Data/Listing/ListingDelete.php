<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
class ListingDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ListingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingModel();
}
}