<?php
namespace Nemundo\App\Help\Data\Code;
class CodeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CodeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CodeModel();
}
}