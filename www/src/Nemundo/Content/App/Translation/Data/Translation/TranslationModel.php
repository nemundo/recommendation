<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
class TranslationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadModel() {
$this->tableName = "translation_translation";
$this->aliasTableName = "translation_translation";
$this->label = "Translation";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "translation_translation";
$this->id->externalTableName = "translation_translation";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "translation_translation_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "translation_translation";
$this->active->externalTableName = "translation_translation";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "translation_translation_active";
$this->active->label = "Active";
$this->active->allowNullValue = true;

}
}