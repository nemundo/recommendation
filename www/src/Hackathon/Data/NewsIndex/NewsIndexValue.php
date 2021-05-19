<?php
namespace Hackathon\Data\NewsIndex;
class NewsIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var NewsIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsIndexModel();
}
}