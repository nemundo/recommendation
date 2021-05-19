<?php
namespace Nemundo\Content\App\Podcast\Data\Podcast;
use Nemundo\Model\Data\AbstractModelUpdate;
class PodcastUpdate extends AbstractModelUpdate {
/**
* @var PodcastModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->rssUrl, $this->rssUrl);
$this->typeValueList->setModelValue($this->model->podcast, $this->podcast);
$this->typeValueList->setModelValue($this->model->description, $this->description);
parent::update();
}
}