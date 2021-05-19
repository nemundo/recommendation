<?php
namespace Nemundo\Content\App\Stream\Data\Stream;
class StreamRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var StreamModel
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
* @var bool
*/
public $hasMessage;

/**
* @var string
*/
public $message;

/**
* @var string
*/
public $contentViewId;

/**
* @var \Nemundo\Content\Data\ContentView\ContentViewRow
*/
public $contentView;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var bool
*/
public $active;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->hasMessage = boolval($this->getModelValue($model->hasMessage));
$this->message = $this->getModelValue($model->message);
$this->contentViewId = $this->getModelValue($model->contentViewId);
if ($model->contentView !== null) {
$this->loadNemundoContentDataContentViewContentViewcontentViewRow($model->contentView);
}
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->active = boolval($this->getModelValue($model->active));
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentViewContentViewcontentViewRow($model) {
$this->contentView = new \Nemundo\Content\Data\ContentView\ContentViewRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}