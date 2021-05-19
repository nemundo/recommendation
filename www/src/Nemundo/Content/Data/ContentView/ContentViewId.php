<?php
namespace Nemundo\Content\Data\ContentView;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContentViewId extends AbstractModelIdValue {
/**
* @var ContentViewModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentViewModel();
}
}