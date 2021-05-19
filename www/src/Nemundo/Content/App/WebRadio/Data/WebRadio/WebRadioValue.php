<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebRadioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebRadioModel();
}
}