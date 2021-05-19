<?php
namespace Nemundo\User\Data\Usergroup;
class UsergroupRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UsergroupModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $usergroup;

/**
* @var bool
*/
public $setupStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->usergroup = $this->getModelValue($model->usergroup);
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
}
}