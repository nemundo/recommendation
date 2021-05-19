<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
use Nemundo\Model\Data\AbstractModelUpdate;
class ListingUpdate extends AbstractModelUpdate {
/**
* @var ListingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingModel();
}
public function update() {
parent::update();
}
}