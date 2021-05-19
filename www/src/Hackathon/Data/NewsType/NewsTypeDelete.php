<?php
namespace Hackathon\Data\NewsType;
class NewsTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var NewsTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsTypeModel();
}
}