<?php
namespace Nemundo\Content\App\Website\Data\Website;
class WebsiteCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebsiteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebsiteModel();
}
}