<?php
namespace Nemundo\App\Script\Data\Script;
class ScriptDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ScriptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ScriptModel();
}
}