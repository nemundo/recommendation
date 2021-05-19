<?php
namespace Nemundo\Content\App\Note\Data\Note;
class NoteCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var NoteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NoteModel();
}
}