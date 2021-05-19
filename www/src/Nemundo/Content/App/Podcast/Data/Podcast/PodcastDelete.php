<?php
namespace Nemundo\Content\App\Podcast\Data\Podcast;
class PodcastDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PodcastModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PodcastModel();
}
}