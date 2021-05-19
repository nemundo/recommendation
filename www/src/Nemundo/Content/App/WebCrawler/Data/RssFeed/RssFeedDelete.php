<?php
namespace Nemundo\Content\App\WebCrawler\Data\RssFeed;
class RssFeedDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RssFeedModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RssFeedModel();
}
}