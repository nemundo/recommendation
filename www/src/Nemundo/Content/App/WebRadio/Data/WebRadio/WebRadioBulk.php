<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WebRadioModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->webRadio, $this->webRadio);
$this->typeValueList->setModelValue($this->model->streamUrl, $this->streamUrl);
$id = parent::save();
return $id;
}
}