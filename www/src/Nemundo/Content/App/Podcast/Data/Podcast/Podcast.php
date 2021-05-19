<?php
namespace Nemundo\Content\App\Podcast\Data\Podcast;
class Podcast extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PodcastModel
*/
protected $model;

/**
* @var string
*/
public $rssUrl;

/**
* @var string
*/
public $podcast;

/**
* @var string
*/
public $description;

public function __construct() {
parent::__construct();
$this->model = new PodcastModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->rssUrl, $this->rssUrl);
$this->typeValueList->setModelValue($this->model->podcast, $this->podcast);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$id = parent::save();
return $id;
}
}