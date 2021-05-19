<?php
namespace Hackathon\Data\WordIndex;
class WordIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WordIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordIndexModel();
}
}