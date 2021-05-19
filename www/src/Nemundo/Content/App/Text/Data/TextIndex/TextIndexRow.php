<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TextIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $parentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $parent;

/**
* @var string
*/
public $text;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->parentId = intval($this->getModelValue($model->parentId));
if ($model->parent !== null) {
$this->loadNemundoContentDataContentContentparentRow($model->parent);
}
$this->text = $this->getModelValue($model->text);
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
}
private function loadNemundoContentDataContentContentparentRow($model) {
$this->parent = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}