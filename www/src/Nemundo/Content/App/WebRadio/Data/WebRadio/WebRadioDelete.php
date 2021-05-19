<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebRadioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebRadioModel();
}
}