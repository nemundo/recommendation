<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
use Nemundo\Model\Id\AbstractModelIdValue;
class ListingValueId extends AbstractModelIdValue {
/**
* @var ListingValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingValueModel();
}
}