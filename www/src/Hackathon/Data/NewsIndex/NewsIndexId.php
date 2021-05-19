<?php
namespace Hackathon\Data\NewsIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class NewsIndexId extends AbstractModelIdValue {
/**
* @var NewsIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsIndexModel();
}
}