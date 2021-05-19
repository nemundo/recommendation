<?php
namespace Hackathon\Data\Snb;
use Nemundo\Model\Id\AbstractModelIdValue;
class SnbId extends AbstractModelIdValue {
/**
* @var SnbModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SnbModel();
}
}