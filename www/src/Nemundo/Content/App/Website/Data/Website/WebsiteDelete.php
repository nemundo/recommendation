<?php
namespace Nemundo\Content\App\Website\Data\Website;
class WebsiteDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebsiteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebsiteModel();
}
}