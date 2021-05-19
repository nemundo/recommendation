<?php
namespace Nemundo\Content\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "translation_large_text_translation";
$this->aliasTableName = "translation_large_text_translation";
$this->label = "Large Text Translation";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "translation_large_text_translation";
$this->id->externalTableName = "translation_large_text_translation";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "translation_large_text_translation_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

}
}