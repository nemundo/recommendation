<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContentViewModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentViewModel();
}
}