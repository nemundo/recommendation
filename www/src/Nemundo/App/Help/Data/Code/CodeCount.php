<?php
namespace Nemundo\App\Help\Data\Code;
class CodeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CodeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CodeModel();
}
}