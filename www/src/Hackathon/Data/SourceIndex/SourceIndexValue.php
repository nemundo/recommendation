<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SourceIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceIndexModel();
}
}