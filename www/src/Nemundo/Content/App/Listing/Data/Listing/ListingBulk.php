<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
class ListingBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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