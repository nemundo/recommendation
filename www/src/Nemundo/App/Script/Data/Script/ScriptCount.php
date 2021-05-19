<?php
namespace Nemundo\App\Script\Data\Script;
class ScriptCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ScriptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ScriptModel();
}
}