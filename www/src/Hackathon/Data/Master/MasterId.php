<?php
namespace Hackathon\Data\Master;
use Nemundo\Model\Id\AbstractModelIdValue;
class MasterId extends AbstractModelIdValue {
/**
* @var MasterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MasterModel();
}
}