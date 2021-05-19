<?php
namespace Nemundo\Content\App\Website\Data\Website;
class Website extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WebsiteModel
*/
protected $model;

/**
* @var string
*/
public $title;

public function __construct() {
parent::__construct();
$this->model = new WebsiteModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$id = parent::save();
return $id;
}
}