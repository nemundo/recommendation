<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
class WebcamImageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebcamImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamImageModel();
}
}