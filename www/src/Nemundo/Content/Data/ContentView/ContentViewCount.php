<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContentViewModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentViewModel();
}
}