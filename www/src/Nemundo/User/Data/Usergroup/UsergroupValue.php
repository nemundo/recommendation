<?php
namespace Nemundo\User\Data\Usergroup;
class UsergroupValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupModel();
}
}