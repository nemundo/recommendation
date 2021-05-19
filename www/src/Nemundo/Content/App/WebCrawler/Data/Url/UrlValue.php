<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
class UrlValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UrlModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UrlModel();
}
}