<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var IframeVideoModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->sourceUrl, $this->sourceUrl);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$id = parent::save();
return $id;
}
}