<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
class WebCrawlerValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebCrawlerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebCrawlerModel();
}
}