<?php
namespace Hackathon\Data\Keyword;
use Nemundo\Model\Id\AbstractModelIdValue;
class KeywordId extends AbstractModelIdValue {
/**
* @var KeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
}