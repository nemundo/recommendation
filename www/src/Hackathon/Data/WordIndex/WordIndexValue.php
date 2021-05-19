<?php
namespace Hackathon\Data\WordIndex;
class WordIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WordIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordIndexModel();
}
}