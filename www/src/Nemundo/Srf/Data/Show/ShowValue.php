<?php
namespace Nemundo\Srf\Data\Show;
class ShowValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ShowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowModel();
}
}