<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
use Nemundo\Model\Id\AbstractModelIdValue;
class VersionTextId extends AbstractModelIdValue {
/**
* @var VersionTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionTextModel();
}
}