<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
use Nemundo\Model\Data\AbstractModelUpdate;
class WebRadioUpdate extends AbstractModelUpdate {
/**
* @var WebRadioModel
*/
public $model;

/**
* @var string
*/
public $webRadio;

/**
* @var string
*/
public $streamUrl;

public function __construct() {
parent::__construct();
$this->model = new WebRadioModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->webRadio, $this->webRadio);
$this->typeValueList->setModelValue($this->model->streamUrl, $this->streamUrl);
parent::update();
}
}