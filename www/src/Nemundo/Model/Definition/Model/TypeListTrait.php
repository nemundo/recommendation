<?php

namespace Nemundo\Model\Definition\Model;


use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Model\Type\External\ExternalType;
use Nemundo\Model\Type\File\FileType;
use Nemundo\Model\Type\File\ImageType;
use Nemundo\Model\Type\File\RedirectFilenameType;
use Nemundo\Model\Type\Text\TextType;
use Nemundo\Orm\Type\OrmTypeTrait;

trait TypeListTrait
{

    /**
     * @var string
     */
    public $aliasTableName;

    /**
     * @var AbstractModelType[]
     */
    private $typeList = [];


    public function addType(AbstractModelType $type)
    {

        $this->typeList[] = $type;

    }


    /**
     * @return AbstractModelType[]|AbstractComplexType[]|OrmTypeTrait[]|ExternalType[]|ImageType[]|TextType[]|FileType[]|RedirectFilenameType[]
     */
    public function getTypeList($recursiv = false)
    {

        $list = $this->typeList;

        if ($recursiv) {

            /** @var AbstractComplexType $type */
            foreach ($this->typeList as $type) {

                if ($type->isObjectOfClass(AbstractComplexType::class)) {

                    /*(new Debug())->write('type'.$type->fieldName);

                    (new Debug())->write($type->getTypeList());
                    exit;*/

                    foreach ($type->getTypeList() as $subType) {

                        //(new Debug())->write('SubType: '.$subType->fieldName);

                        $list[] = $subType;

                    }
                }
            }
        }

        return $list;

    }

}