<?php
namespace Hackathon\Data\BajourArticle;
use Nemundo\Model\Data\AbstractModelUpdate;
class BajourArticleUpdate extends AbstractModelUpdate {
/**
* @var BajourArticleModel
*/
public $model;

/**
* @var string
*/
public $uniqueId;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $lead;

/**
* @var string
*/
public $url;

public function __construct() {
parent::__construct();
$this->model = new BajourArticleModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->uniqueId, $this->uniqueId);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->lead, $this->lead);
$this->typeValueList->setModelValue($this->model->url, $this->url);
parent::update();
}
}