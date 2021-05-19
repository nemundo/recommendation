<?php
namespace Nemundo\App\Help\Data\Code;
class CodeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CodeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CodeModel();
}
}