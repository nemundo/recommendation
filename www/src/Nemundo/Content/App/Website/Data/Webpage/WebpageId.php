<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebpageId extends AbstractModelIdValue {
/**
* @var WebpageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebpageModel();
}
}