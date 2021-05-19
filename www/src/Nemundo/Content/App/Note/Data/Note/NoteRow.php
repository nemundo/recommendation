<?php
namespace Nemundo\Content\App\Note\Data\Note;
class NoteRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var NoteModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $text;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->title = $this->getModelValue($model->title);
$this->text = $this->getModelValue($model->text);
}
}