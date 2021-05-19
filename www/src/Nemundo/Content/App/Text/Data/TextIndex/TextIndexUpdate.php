<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class TextIndexUpdate extends AbstractModelUpdate {
/**
* @var TextIndexModel
*/
public $model;

/**
* @var string
*/
public $parentId;

/**
* @var string
*/
public $text;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new TextIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
parent::update();
}
}