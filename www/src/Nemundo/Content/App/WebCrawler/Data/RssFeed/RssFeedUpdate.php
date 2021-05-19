<?php
namespace Nemundo\Content\App\WebCrawler\Data\RssFeed;
use Nemundo\Model\Data\AbstractModelUpdate;
class RssFeedUpdate extends AbstractModelUpdate {
/**
* @var RssFeedModel
*/
public $model;

/**
* @var string
*/
public $domainId;

/**
* @var string
*/
public $rssUrl;

public function __construct() {
parent::__construct();
$this->model = new RssFeedModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->domainId, $this->domainId);
$this->typeValueList->setModelValue($this->model->rssUrl, $this->rssUrl);
parent::update();
}
}