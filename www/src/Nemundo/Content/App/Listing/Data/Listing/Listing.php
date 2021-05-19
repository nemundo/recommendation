<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
class Listing extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ListingModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new ListingModel();
}
public function save() {
$id = parent::save();
return $id;
}
}