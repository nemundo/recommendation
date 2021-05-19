<?php
namespace Hackathon\Data\NewsType;
class NewsTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var NewsTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsTypeModel();
}
}