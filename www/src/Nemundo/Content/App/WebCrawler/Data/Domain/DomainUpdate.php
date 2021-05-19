<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
use Nemundo\Model\Data\AbstractModelUpdate;
class DomainUpdate extends AbstractModelUpdate {
/**
* @var DomainModel
*/
public $model;

/**
* @var string
*/
public $domain;

/**
* @var string
*/
public $url;

public function __construct() {
parent::__construct();
$this->model = new DomainModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->domain, $this->domain);
$this->typeValueList->setModelValue($this->model->url, $this->url);
parent::update();
}
}