<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var IframeVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IframeVideoModel();
}
}