<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CameraModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CameraModel();
}
}