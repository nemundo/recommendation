<?php
namespace Nemundo\Content\App\Bookmark\Data\Bookmark;
class Bookmark extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var BookmarkModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$id = parent::save();
return $id;
}
}