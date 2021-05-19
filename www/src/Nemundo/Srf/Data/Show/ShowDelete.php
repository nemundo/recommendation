<?php
namespace Nemundo\Srf\Data\Show;
class ShowDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ShowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowModel();
}
}