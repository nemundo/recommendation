<?php
namespace Nemundo\Content\App\Feed\Data\Feed;
class Feed extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var FeedModel
*/
protected $model;

/**
* @var string
*/
public $feedUrl;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $description;

public function __construct() {
parent::__construct();
$this->model = new FeedModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->feedUrl, $this->feedUrl);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$id = parent::save();
return $id;
}
}