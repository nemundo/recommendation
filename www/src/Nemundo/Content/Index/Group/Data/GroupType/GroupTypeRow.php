<?php
namespace Nemundo\Content\Index\Group\Data\GroupType;
class GroupTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var GroupTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $groupTypeId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $groupType;

/**
* @var bool
*/
public $setupStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->groupTypeId = $this->getModelValue($model->groupTypeId);
if ($model->groupType !== null) {
$this->loadNemundoContentDataContentTypeContentTypegroupTypeRow($model->groupType);
}
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
}
private function loadNemundoContentDataContentTypeContentTypegroupTypeRow($model) {
$this->groupType = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
}