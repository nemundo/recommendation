<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebRadioId extends AbstractModelIdValue {
/**
* @var WebRadioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebRadioModel();
}
}