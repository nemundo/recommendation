<?php
namespace Nemundo\Content\App\Inbox\Data\Inbox;
class InboxRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var InboxModel
*/
public $model;

/**
* @var string
*/
public $id;

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
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var bool
*/
public $deleted;

/**
* @var string
*/
public $fromId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $from;

/**
* @var string
*/
public $message;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->deleted = boolval($this->getModelValue($model->deleted));
$this->fromId = $this->getModelValue($model->fromId);
if ($model->from !== null) {
$this->loadNemundoUserDataUserUserfromRow($model->from);
}
$this->message = $this->getModelValue($model->message);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoUserDataUserUserfromRow($model) {
$this->from = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}