<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
use Nemundo\Model\Data\AbstractModelUpdate;
class IframeVideoUpdate extends AbstractModelUpdate {
/**
* @var IframeVideoModel
*/
public $model;

/**
* @var string
*/
public $sourceUrl;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new IframeVideoModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->sourceUrl, $this->sourceUrl);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
parent::update();
}
}