<?php
namespace Nemundo\Content\App\Note\Data\Note;
class NoteDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var NoteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NoteModel();
}
}