<?php

namespace Nemundo\App\ModelDesigner\Collection;


use Nemundo\App\ModelDesigner\Model\ModelDesignerOrmModel;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Model\Template\ActiveOrmModel;
use Nemundo\Orm\Model\Template\DefaultOrmModel;
use Nemundo\User\Orm\UserOrmModel;

class ModelTemplateCollection extends AbstractBase
{

    /** @var ModelDesignerOrmModel[] $list */
    private static $templateList = [];

    public static function addModelTemplate(AbstractOrmModel $ormModel)
    {

        //(new Debug())->write($ormModel->templateName);

        //ModelTemplateCollection::$templateList[$ormModel->templateName] = $ormModel;
        if (!isset( ModelTemplateCollection::$templateList[$ormModel->templateName])) {
        ModelTemplateCollection::$templateList[$ormModel->templateName] = $ormModel;
        }
        //ModelTemplateCollection::$templateList[] = $ormModel;

    }


    public function __construct()
    {

        //\Nemundo\App\ModelDesigner\Collection\ModelTemplateCollection::addModelTemplate(new \Nemundo\Process\Content\Model\ContentOrmModel());
        //\Nemundo\App\ModelDesigner\Collection\ModelTemplateCollection::addModelTemplate(new \Nemundo\Process\Workflow\Model\WorkflowOrmModel());


        ModelTemplateCollection::addModelTemplate(new DefaultOrmModel());
        ModelTemplateCollection::addModelTemplate(new ActiveOrmModel());
        ModelTemplateCollection::addModelTemplate(new UserOrmModel());



       // (new Debug())->write(sizeof(ModelTemplateCollection::$templateList));


    }


    public function getCollection()
    {

        return ModelTemplateCollection::$templateList;

        /** @var ModelDesignerOrmModel[] $list */

        /*$list = [];
        $list[] = new OrmModel();
        $list[] = new ActiveOrmModel();
        $list[] = new UserOrmModel();
        //$list[]=new ContentOrmModel();
        //$list[]=new WorkflowOrmModel();

        return $list;*/

    }


    public function getModelByTemplateName($templateName)
    {

        $model = null;
        foreach ($this->getCollection() as $ormModel) {
            if ($ormModel->templateName == $templateName) {
                $model = clone($ormModel);
            }
        }

        if ($model == null) {
            (new Debug())->write('No model. Template Name: ' . $templateName);
            exit;
        }

        return $model;


    }

}