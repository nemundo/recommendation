<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndex extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TextIndexModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}