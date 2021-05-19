<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebRadioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebRadioModel();
}
}