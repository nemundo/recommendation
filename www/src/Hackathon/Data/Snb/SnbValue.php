<?php
namespace Hackathon\Data\Snb;
class SnbValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SnbModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SnbModel();
}
}