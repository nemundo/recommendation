<?php
namespace Nemundo\Content\Index\Log\Data\Log;
class LogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $contentLogId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $contentLog;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var int
*/
public $contentItemId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $contentItem;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->contentLogId = intval($this->getModelValue($model->contentLogId));
if ($model->contentLog !== null) {
$this->loadNemundoContentDataContentContentcontentLogRow($model->contentLog);
}
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->contentItemId = intval($this->getModelValue($model->contentItemId));
if ($model->contentItem !== null) {
$this->loadNemundoContentDataContentContentcontentItemRow($model->contentItem);
}
}
private function loadNemundoContentDataContentContentcontentLogRow($model) {
$this->contentLog = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentItemRow($model) {
$this->contentItem = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}