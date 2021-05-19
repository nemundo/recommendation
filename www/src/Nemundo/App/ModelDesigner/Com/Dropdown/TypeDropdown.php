<?php

namespace Nemundo\App\ModelDesigner\Com\Dropdown;

use Nemundo\App\ModelDesigner\Collection\TypeCollection;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Parameter\TypeParameter;
use Nemundo\App\ModelDesigner\Site\Type\TypeNewSite;
use Nemundo\Orm\Type\Text\TextOrmType;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;

// ModelTypeDropdown
class TypeDropdown extends BootstrapSiteDropdown
{

    /**
     * @var string
     */
    //public $modelId;

    public function getContent()
    {



        foreach ((new TypeCollection())->getTypeCollection() as $type) {

            $site = clone(TypeNewSite::$site);
            $site->title =$type->typeLabel;
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter());
            $site->addParameter(new ModelParameter());
            $site->addParameter(new TypeParameter($type->typeName));
            $this->addSite($site);

        }

        return parent::getContent();

    }


    private function addType($type) {

        $site = clone(TypeNewSite::$site);
        $site->title =$type;
        $site->addParameter(new ProjectParameter());
        $site->addParameter(new AppParameter());
        $site->addParameter(new ModelParameter());
        $this->addSite($site);

    }

}