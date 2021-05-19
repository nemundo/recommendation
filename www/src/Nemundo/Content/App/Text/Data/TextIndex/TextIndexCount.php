<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TextIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextIndexModel();
}
}