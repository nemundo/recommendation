<?php
namespace Hackathon\Data\SourceIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class SourceIndexId extends AbstractModelIdValue {
/**
* @var SourceIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceIndexModel();
}
}