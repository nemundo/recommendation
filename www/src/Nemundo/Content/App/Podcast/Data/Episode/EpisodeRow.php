<?php
namespace Nemundo\Content\App\Podcast\Data\Episode;
class EpisodeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var EpisodeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $podcastId;

/**
* @var \Nemundo\Content\App\Podcast\Data\Podcast\PodcastRow
*/
public $podcast;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $text;

/**
* @var string
*/
public $audioUrl;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $length;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->podcastId = intval($this->getModelValue($model->podcastId));
if ($model->podcast !== null) {
$this->loadNemundoContentAppPodcastDataPodcastPodcastpodcastRow($model->podcast);
}
$this->title = $this->getModelValue($model->title);
$this->text = $this->getModelValue($model->text);
$this->audioUrl = $this->getModelValue($model->audioUrl);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->length = intval($this->getModelValue($model->length));
}
private function loadNemundoContentAppPodcastDataPodcastPodcastpodcastRow($model) {
$this->podcast = new \Nemundo\Content\App\Podcast\Data\Podcast\PodcastRow($this->row, $model);
}
}