<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SourceIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceIndexModel();
}
}