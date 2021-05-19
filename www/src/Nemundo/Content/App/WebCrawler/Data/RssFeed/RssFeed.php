<?php
namespace Nemundo\Content\App\WebCrawler\Data\RssFeed;
class RssFeed extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var RssFeedModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->domainId, $this->domainId);
$this->typeValueList->setModelValue($this->model->rssUrl, $this->rssUrl);
$id = parent::save();
return $id;
}
}