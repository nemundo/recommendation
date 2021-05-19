<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
class WebCrawlerDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebCrawlerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebCrawlerModel();
}
}