<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var VersionTextModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $versionText;

/**
* @var int
*/
public $version;

/**
* @var int
*/
public $textId;

/**
* @var \Nemundo\Content\App\Text\Data\Text\TextRow
*/
public $text;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->versionText = $this->getModelValue($model->versionText);
$this->version = intval($this->getModelValue($model->version));
$this->textId = intval($this->getModelValue($model->textId));
if ($model->text !== null) {
$this->loadNemundoContentAppTextDataTextTexttextRow($model->text);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
}
private function loadNemundoContentAppTextDataTextTexttextRow($model) {
$this->text = new \Nemundo\Content\App\Text\Data\Text\TextRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}