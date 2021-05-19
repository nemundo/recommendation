<?php
namespace Hackathon\Data\RssFeed;
class RssFeed extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var RssFeedModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->rssUrl, $this->rssUrl);
$this->typeValueList->setModelValue($this->model->feedTitle, $this->feedTitle);
$id = parent::save();
return $id;
}
}