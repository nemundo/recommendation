<?php
namespace Nemundo\Content\App\Note\Data\Note;
class NoteValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var NoteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NoteModel();
}
}