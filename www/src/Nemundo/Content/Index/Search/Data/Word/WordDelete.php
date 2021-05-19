<?php
namespace Nemundo\Content\Index\Search\Data\Word;
class WordDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordModel();
}
}