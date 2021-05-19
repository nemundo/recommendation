<?php
namespace Nemundo\User\Data\Usergroup;
class UsergroupCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupModel();
}
}