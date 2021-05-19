<?php
namespace Nemundo\Content\App\Bookmark\Data\Bookmark;
use Nemundo\Model\Data\AbstractModelUpdate;
class BookmarkUpdate extends AbstractModelUpdate {
/**
* @var BookmarkModel
*/
public $model;

/**
* @var string
*/
public $url;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $description;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

public function __construct() {
parent::__construct();
$this->model = new BookmarkModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
parent::update();
}
}