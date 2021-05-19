<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class TextIndexId extends AbstractModelIdValue {
/**
* @var TextIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextIndexModel();
}
}