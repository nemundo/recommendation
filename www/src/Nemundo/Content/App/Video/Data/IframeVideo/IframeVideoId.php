<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
use Nemundo\Model\Id\AbstractModelIdValue;
class IframeVideoId extends AbstractModelIdValue {
/**
* @var IframeVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IframeVideoModel();
}
}