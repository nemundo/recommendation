<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class DomainCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var DomainModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DomainModel();
}
}