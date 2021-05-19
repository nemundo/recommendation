<?php
namespace Hackathon\Data\RssFeed;
use Nemundo\Model\Data\AbstractModelUpdate;
class RssFeedUpdate extends AbstractModelUpdate {
/**
* @var RssFeedModel
*/
public $model;

/**
* @var string
*/
public $rssUrl;

/**
* @var string
*/
public $feedTitle;

public function __construct() {
parent::__construct();
$this->model = new RssFeedModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->rssUrl, $this->rssUrl);
$this->typeValueList->setModelValue($this->model->feedTitle, $this->feedTitle);
parent::update();
}
}