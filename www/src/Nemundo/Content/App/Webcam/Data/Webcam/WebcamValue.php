<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class WebcamValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebcamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
}
}