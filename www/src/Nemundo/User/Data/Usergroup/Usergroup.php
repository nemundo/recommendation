<?php
namespace Nemundo\User\Data\Usergroup;
class Usergroup extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UsergroupModel
*/
protected $model;

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

public function __construct() {
parent::__construct();
$this->model = new UsergroupModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->usergroup, $this->usergroup);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$id = parent::save();
return $id;
}
}