<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
use Nemundo\Model\Data\AbstractModelUpdate;
class VersionLargeTextUpdate extends AbstractModelUpdate {
/**
* @var VersionLargeTextModel
*/
public $model;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $largeText;

public function __construct() {
parent::__construct();
$this->model = new VersionLargeTextModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->largeText, $this->largeText);
parent::update();
}
}