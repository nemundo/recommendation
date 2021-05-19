<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
class UrlCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UrlModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UrlModel();
}
}