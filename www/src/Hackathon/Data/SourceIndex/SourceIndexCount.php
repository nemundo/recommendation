<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SourceIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceIndexModel();
}
}