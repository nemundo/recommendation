<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class WebcamCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebcamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
}
}