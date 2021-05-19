<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebcamId extends AbstractModelIdValue {
/**
* @var WebcamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
}
}