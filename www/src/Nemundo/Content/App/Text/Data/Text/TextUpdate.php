<?php
namespace Nemundo\Content\App\Text\Data\Text;
use Nemundo\Model\Data\AbstractModelUpdate;
class TextUpdate extends AbstractModelUpdate {
/**
* @var TextModel
*/
public $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new TextModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
parent::update();
}
}