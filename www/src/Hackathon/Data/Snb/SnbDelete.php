<?php
namespace Hackathon\Data\Snb;
class SnbDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SnbModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SnbModel();
}
}