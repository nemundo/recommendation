<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
use Nemundo\Model\Data\AbstractModelUpdate;
class WebpageUpdate extends AbstractModelUpdate {
/**
* @var WebpageModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
parent::update();
}
}