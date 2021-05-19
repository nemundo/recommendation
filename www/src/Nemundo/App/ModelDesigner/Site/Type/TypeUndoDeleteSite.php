<?php

namespace Nemundo\App\ModelDesigner\Site\Type;


use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\TypeForm;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Parameter\TypeParameter;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\Core\Debug\Debug;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Package\FontAwesome\Site\AbstractRestoreIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class TypeUndoDeleteSite extends AbstractRestoreIconSite
{

    /**
     * @var TypeUndoDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Undo Delete Type Delete';
        $this->url = 'type-delete-undo';

        TypeUndoDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $appJson = (new AppParameter())->getApp($project);
        //$model = (new ModelParameter())->getModel($appJson);

        foreach ( $appJson->getModelList() as $model) {

            if ($model->tableName == (new ModelParameter())->getValue() ) {

                foreach ($model->getTypeList(false,false) as $type) {

                    if ($type->fieldName == (new FieldNameParameter())->getValue()) {
                        $type->isDeleted=false;

                        //(new Debug())->write('delete');
                    }

                }

            }

        }

        //(new Debug())->write($appJson);

        $appJson->writeJson();
        //exit;


        (new UrlReferer())->redirect();


    }

}