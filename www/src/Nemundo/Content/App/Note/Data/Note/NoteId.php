<?php
namespace Nemundo\Content\App\Note\Data\Note;
use Nemundo\Model\Id\AbstractModelIdValue;
class NoteId extends AbstractModelIdValue {
/**
* @var NoteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NoteModel();
}
}