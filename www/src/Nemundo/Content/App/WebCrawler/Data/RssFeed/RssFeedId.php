<?php
namespace Nemundo\Content\App\WebCrawler\Data\RssFeed;
use Nemundo\Model\Id\AbstractModelIdValue;
class RssFeedId extends AbstractModelIdValue {
/**
* @var RssFeedModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RssFeedModel();
}
}