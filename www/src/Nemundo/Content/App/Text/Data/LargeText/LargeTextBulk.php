<?php
namespace Nemundo\Content\App\Text\Data\LargeText;
class LargeTextBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var LargeTextModel
*/
protected $model;

/**
* @var string
*/
public $largeText;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new LargeTextModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->largeText, $this->largeText);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$id = parent::save();
return $id;
}
}