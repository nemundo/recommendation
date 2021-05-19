<?php
namespace Nemundo\Content\App\Text\Data\Text;
use Nemundo\Model\Id\AbstractModelIdValue;
class TextId extends AbstractModelIdValue {
/**
* @var TextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextModel();
}
}