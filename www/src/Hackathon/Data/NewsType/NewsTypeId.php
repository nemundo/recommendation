<?php
namespace Hackathon\Data\NewsType;
use Nemundo\Model\Id\AbstractModelIdValue;
class NewsTypeId extends AbstractModelIdValue {
/**
* @var NewsTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsTypeModel();
}
}