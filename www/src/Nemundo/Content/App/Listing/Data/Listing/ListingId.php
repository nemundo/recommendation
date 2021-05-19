<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
use Nemundo\Model\Id\AbstractModelIdValue;
class ListingId extends AbstractModelIdValue {
/**
* @var ListingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingModel();
}
}