<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicShareRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PublicShareModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var string
*/
public $viewId;

/**
* @var \Nemundo\Content\Data\ContentView\ContentViewRow
*/
public $view;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->viewId = $this->getModelValue($model->viewId);
if ($model->view !== null) {
$this->loadNemundoContentDataContentViewContentViewviewRow($model->view);
}
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentViewContentViewviewRow($model) {
$this->view = new \Nemundo\Content\Data\ContentView\ContentViewRow($this->row, $model);
}
}