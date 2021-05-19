<?php
namespace Nemundo\App\Help\Data\Code;
use Nemundo\Model\Id\AbstractModelIdValue;
class CodeId extends AbstractModelIdValue {
/**
* @var CodeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CodeModel();
}
}