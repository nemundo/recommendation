<?php
namespace Nemundo\Content\App\Note\Data\Note;
use Nemundo\Model\Data\AbstractModelUpdate;
class NoteUpdate extends AbstractModelUpdate {
/**
* @var NoteModel
*/
public $model;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new NoteModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->text, $this->text);
parent::update();
}
}