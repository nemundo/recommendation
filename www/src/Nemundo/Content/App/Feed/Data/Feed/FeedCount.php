<?php
namespace Nemundo\Content\App\Feed\Data\Feed;
class FeedCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FeedModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FeedModel();
}
}