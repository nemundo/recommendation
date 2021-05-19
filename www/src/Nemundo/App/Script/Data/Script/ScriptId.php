<?php
namespace Nemundo\App\Script\Data\Script;
use Nemundo\Model\Id\AbstractModelIdValue;
class ScriptId extends AbstractModelIdValue {
/**
* @var ScriptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ScriptModel();
}
}