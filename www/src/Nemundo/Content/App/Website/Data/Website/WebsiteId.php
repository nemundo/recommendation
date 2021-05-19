<?php
namespace Nemundo\Content\App\Website\Data\Website;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebsiteId extends AbstractModelIdValue {
/**
* @var WebsiteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebsiteModel();
}
}