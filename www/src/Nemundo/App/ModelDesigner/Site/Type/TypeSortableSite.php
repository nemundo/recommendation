<?php

namespace Nemundo\App\ModelDesigner\Site\Type;


use Nemundo\Core\Debug\Debug;
use Nemundo\Web\Site\AbstractSite;

class TypeSortableSite extends AbstractSite
{

    /**
     * @var TypeSortableSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'type-sortable';
        $this->menuActive = false;

        TypeSortableSite::$site = $this;

    }


    public function loadContent()
    {


        (new Debug())->write($_POST);


        /*
                foreach ($_POST['item'] as $value) {

                    $fieldValue = $value;

                    $data = new AppModelFieldUpdate();
                    $data->connection = new AppDesignerConnection();
                    $data->itemOrder = $itemOrder;
                    $data->updateById($value);

                    $itemOrder++;

                }*/


    }

}