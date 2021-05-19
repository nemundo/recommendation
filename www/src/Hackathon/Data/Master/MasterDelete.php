<?php
namespace Hackathon\Data\Master;
class MasterDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MasterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MasterModel();
}
}