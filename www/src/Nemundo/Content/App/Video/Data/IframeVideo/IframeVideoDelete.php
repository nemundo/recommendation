<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var IframeVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IframeVideoModel();
}
}