<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class Domain extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var DomainModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->domain, $this->domain);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$id = parent::save();
return $id;
}
}