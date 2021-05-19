<?php
namespace Nemundo\Content\App\Favorite\Data\Favorite;
class FavoriteValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FavoriteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FavoriteModel();
}
}