<?php
namespace Nemundo\Content\Index\Group\Data\Group;
class GroupRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var GroupModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $group;

/**
* @var string
*/
public $groupTypeId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $groupType;

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
$this->group = $this->getModelValue($model->group);
$this->groupTypeId = $this->getModelValue($model->groupTypeId);
if ($model->groupType !== null) {
$this->loadNemundoContentDataContentTypeContentTypegroupTypeRow($model->groupType);
}
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
}
private function loadNemundoContentDataContentTypeContentTypegroupTypeRow($model) {
$this->groupType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}