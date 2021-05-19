<?php
namespace Nemundo\Content\App\WebCrawler\Data\RssFeed;
class RssFeedValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RssFeedModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RssFeedModel();
}
}