<?php
namespace Nemundo\Content\App\Text\Data\Text;
class Text extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TextModel
*/
protected $model;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new TextModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->text, $this->text);
$id = parent::save();
return $id;
}
}