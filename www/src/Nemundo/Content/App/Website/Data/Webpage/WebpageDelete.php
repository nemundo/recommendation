<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
class WebpageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebpageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebpageModel();
}
}