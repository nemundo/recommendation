<?php
namespace Nemundo\Content\App\Feed\Data\Feed;
use Nemundo\Model\Data\AbstractModelUpdate;
class FeedUpdate extends AbstractModelUpdate {
/**
* @var FeedModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->feedUrl, $this->feedUrl);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
parent::update();
}
}