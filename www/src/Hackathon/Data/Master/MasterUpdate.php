<?php
namespace Hackathon\Data\Master;
use Nemundo\Model\Data\AbstractModelUpdate;
class MasterUpdate extends AbstractModelUpdate {
/**
* @var MasterModel
*/
public $model;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new MasterModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
parent::update();
}
}