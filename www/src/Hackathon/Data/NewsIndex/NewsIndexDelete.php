<?php
namespace Hackathon\Data\NewsIndex;
class NewsIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var NewsIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsIndexModel();
}
}