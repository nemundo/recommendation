<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
class WebpageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebpageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebpageModel();
}
}