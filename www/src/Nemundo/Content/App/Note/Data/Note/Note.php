<?php
namespace Nemundo\Content\App\Note\Data\Note;
class Note extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var NoteModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$id = parent::save();
return $id;
}
}