<?php
namespace Hackathon\Data\Master;
class MasterBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var MasterModel
*/
protected $model;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new MasterModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$id = parent::save();
return $id;
}
}