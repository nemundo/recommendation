<?php
namespace Nemundo\Content\App\Text\Data\LargeText;
use Nemundo\Model\Data\AbstractModelUpdate;
class LargeTextUpdate extends AbstractModelUpdate {
/**
* @var LargeTextModel
*/
public $model;

/**
* @var string
*/
public $largeText;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new LargeTextModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->largeText, $this->largeText);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
parent::update();
}
}