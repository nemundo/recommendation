<?php
namespace Nemundo\Content\App\Website\Data\Website;
use Nemundo\Model\Data\AbstractModelUpdate;
class WebsiteUpdate extends AbstractModelUpdate {
/**
* @var WebsiteModel
*/
public $model;

/**
* @var string
*/
public $title;

public function __construct() {
parent::__construct();
$this->model = new WebsiteModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
parent::update();
}
}