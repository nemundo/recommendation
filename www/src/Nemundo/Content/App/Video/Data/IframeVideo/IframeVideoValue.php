<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var IframeVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IframeVideoModel();
}
}