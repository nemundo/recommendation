<?php
namespace Hackathon\Data\Master;
class MasterValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MasterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MasterModel();
}
}