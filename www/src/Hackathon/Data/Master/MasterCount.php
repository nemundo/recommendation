<?php
namespace Hackathon\Data\Master;
class MasterCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MasterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MasterModel();
}
}