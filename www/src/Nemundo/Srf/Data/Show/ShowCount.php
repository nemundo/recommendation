<?php
namespace Nemundo\Srf\Data\Show;
class ShowCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ShowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowModel();
}
}