<?php
namespace Hackathon\Data\Word;
class WordValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordModel();
}
}