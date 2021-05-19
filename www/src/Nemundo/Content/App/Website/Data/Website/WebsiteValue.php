<?php
namespace Nemundo\Content\App\Website\Data\Website;
class WebsiteValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebsiteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebsiteModel();
}
}