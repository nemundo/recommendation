<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
class VersionLargeText extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var VersionLargeTextModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->largeText, $this->largeText);
$id = parent::save();
return $id;
}
}