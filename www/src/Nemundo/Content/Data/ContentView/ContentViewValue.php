<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContentViewModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentViewModel();
}
}