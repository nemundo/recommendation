<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
class WebCrawlerCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebCrawlerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebCrawlerModel();
}
}