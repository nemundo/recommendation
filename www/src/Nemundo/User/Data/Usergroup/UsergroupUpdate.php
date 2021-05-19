<?php
namespace Nemundo\User\Data\Usergroup;
use Nemundo\Model\Data\AbstractModelUpdate;
class UsergroupUpdate extends AbstractModelUpdate {
/**
* @var UsergroupModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->usergroup, $this->usergroup);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
parent::update();
}
}