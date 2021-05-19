<?php


namespace Nemundo\Model\Reader;


use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Db\Sql\Join\SqlJoin;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Definition\Model\TypeListTrait;
use Nemundo\Model\Type\External\ExternalType;
use Nemundo\Model\Type\Text\TextType;
use Nemundo\Model\Type\Text\TranslationTextType;


trait FieldAddTrait
{


    // public für externe models!!!

    /**
     * @var AbstractModel[]
     */
   // protected $externalJoinModelList=[];


    /**
     * @param TypeListTrait $model
     */
    public function addFieldByModel($model)
    {

        foreach ($model->getTypeList() as $type) {

            if (!$type->isObjectOfClass(ExternalType::class)) {

                if ($type->fieldMapping) {

                    $type->tableName = $model->aliasTableName;

                    if ($type->isObjectOfClass(TranslationTextType::class)) {

                        //$type2 = new TextType();
                        //$type2->aliasFieldName = $model->country->aliasFieldName;  // . "_" . LanguageConfig::$currentLanguageCode;
                        //$this->country = $this->getModelValue($type);

                        $type->fieldName = $type->fieldName. "_" . LanguageConfig::$currentLanguageCode;
                        //$type->aliasFieldName = $type->aliasFieldName. "_" . LanguageConfig::$currentLanguageCode;

                        $this->addField($type);


                    } else {
                    $this->addField($type);
                    }

                } else {

                    foreach ($type->getTypeList() as $subType) {
                        $this->addField($subType);
                    }

                }

            }

        }

    }


    /**
     * @param AbstractModel|ExternalType $typeList
     */
    public function checkExternal($typeList, $addFieldByModel = true)
    {

        /** @var ExternalType $type */
        foreach ($typeList->getTypeList() as $type) {

            if ($type->isObjectOfClass(ExternalType::class)) {

                $join = new SqlJoin();
                $join->fieldName = $type->getConditionFieldName();
                $join->externalTableName = $type->externalTableName;
                $join->externalFieldName = 'id';
                $join->externalAliasTableName = $type->aliasTableName;


                // bei search index muss zuerst der externe join hinzugefügt werden !!!
                $this->addJoin($join);

                //$this->select->addJoin($join);


                if ($addFieldByModel) {
                    $this->addFieldByModel($type);
                }
                $this->checkExternal($type,$addFieldByModel);

            }

        }

    }


    /**
     * @param AbstractModel|ExternalType $typeList
     */
    public function checkExternalWithoutField($typeList)
    {

        /** @var ExternalType $type */
        foreach ($typeList->getTypeList() as $type) {

            if ($type->isObjectOfClass(ExternalType::class)) {

                $join = new SqlJoin();
                $join->fieldName = $type->getConditionFieldName();
                $join->externalTableName = $type->externalTableName;
                $join->externalFieldName = 'id';
                $join->externalAliasTableName = $type->aliasTableName;
                $this->addJoin($join);

                //$this->addFieldByModel($type);
                $this->checkExternalWithoutField($type);

            }

        }

    }



    /*
    public function addJoinExternal2(AbstractModel $model) {

        $this->externalJoinModelList[]=$model;

        $this->addFieldByModel($externalModel);
        //$searchIndexReader->checkExternal($externalModel);

    }*/


}