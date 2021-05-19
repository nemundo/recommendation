<?php
namespace Hackathon\Data\WordIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class WordIndexId extends AbstractModelIdValue {
/**
* @var WordIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordIndexModel();
}
}