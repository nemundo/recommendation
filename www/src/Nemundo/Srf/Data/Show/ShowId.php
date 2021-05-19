<?php
namespace Nemundo\Srf\Data\Show;
use Nemundo\Model\Id\AbstractModelIdValue;
class ShowId extends AbstractModelIdValue {
/**
* @var ShowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowModel();
}
}