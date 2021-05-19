<?php
namespace Hackathon\Data\Snb;
class SnbCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SnbModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SnbModel();
}
}