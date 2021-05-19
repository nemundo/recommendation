<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class DomainValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var DomainModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DomainModel();
}
}