<?php
namespace Hackathon\Data\RssFeed;
class RssFeedCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RssFeedModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RssFeedModel();
}
}