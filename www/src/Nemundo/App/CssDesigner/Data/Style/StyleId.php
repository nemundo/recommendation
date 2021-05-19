<?php
namespace Nemundo\App\CssDesigner\Data\Style;
use Nemundo\Model\Id\AbstractModelIdValue;
class StyleId extends AbstractModelIdValue {
/**
* @var StyleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleModel();
}
}