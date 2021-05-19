<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
class Webpage extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WebpageModel
*/
protected $model;

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
$this->model = new WebpageModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$id = parent::save();
return $id;
}
}