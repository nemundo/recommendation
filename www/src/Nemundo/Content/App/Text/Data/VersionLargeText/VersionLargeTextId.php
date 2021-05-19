<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
use Nemundo\Model\Id\AbstractModelIdValue;
class VersionLargeTextId extends AbstractModelIdValue {
/**
* @var VersionLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionLargeTextModel();
}
}