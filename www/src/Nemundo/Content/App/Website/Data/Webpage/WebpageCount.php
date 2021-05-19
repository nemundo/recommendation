<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
class WebpageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebpageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebpageModel();
}
}