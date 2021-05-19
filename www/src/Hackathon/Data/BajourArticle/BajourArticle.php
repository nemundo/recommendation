<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticle extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var BajourArticleModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->uniqueId, $this->uniqueId);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->lead, $this->lead);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$id = parent::save();
return $id;
}
}