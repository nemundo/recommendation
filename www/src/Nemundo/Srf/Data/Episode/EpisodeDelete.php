<?php
namespace Nemundo\Srf\Data\Episode;
class EpisodeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var EpisodeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EpisodeModel();
}
}