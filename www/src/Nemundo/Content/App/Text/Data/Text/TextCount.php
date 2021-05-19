<?php
namespace Nemundo\Content\App\Text\Data\Text;
class TextCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextModel();
}
}