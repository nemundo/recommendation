<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
class WebcamImageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebcamImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamImageModel();
}
}