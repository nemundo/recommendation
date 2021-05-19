<?php

namespace Nemundo\App\ModelDesigner\Type;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\App\ModelDesigner\Site\Image\ImageTypeSite;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Type\Form\ImageTypeFormPart;
use Nemundo\Orm\Type\File\ImageOrmType;

class ImageModelDesignerType extends ImageOrmType
{

    use ModelDesignerTypeTrait;

    public function loadExternalType()
    {

        parent::loadExternalType();
        $this->modelDesignerFormPartClassName =ImageTypeFormPart::class;

    }


    public function getAdditionalInformation()
    {

        $btn = new AdminIconSiteButton();
        $btn->site = ImageTypeSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());
        $btn->site->addParameter(new ModelParameter());
        $btn->site->addParameter(new FieldNameParameter($this->fieldName));

        $text = $btn->getBodyContent();

        return $text;

    }

}