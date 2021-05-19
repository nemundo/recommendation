<?php
namespace Nemundo\App\Script\Data\Script;
class ScriptValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ScriptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ScriptModel();
}
}