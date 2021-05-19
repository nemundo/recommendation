<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebCrawlerId extends AbstractModelIdValue {
/**
* @var WebCrawlerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebCrawlerModel();
}
}