<?php
namespace Nemundo\Srf\Data\Episode;
use Nemundo\Model\Id\AbstractModelIdValue;
class EpisodeId extends AbstractModelIdValue {
/**
* @var EpisodeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EpisodeModel();
}
}