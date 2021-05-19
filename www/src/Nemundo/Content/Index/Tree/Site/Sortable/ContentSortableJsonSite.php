<?php


namespace Nemundo\Content\Index\Tree\Site\Sortable;


use Nemundo\Content\Index\Tree\Data\Tree\TreeUpdate;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\JqueryUi\Sortable\AbstractSortableSite;

class ContentSortableJsonSite extends AbstractSortableSite
{

    /**
     * @var ContentSortableJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'content-sortable';
        ContentSortableJsonSite::$site = $this;

    }


    public function loadContent()
    {

        (new Debug())->write($_POST);

        $itemOrder = 0;
        foreach ($this->getItemOrderList() as $value) {

            $update = new TreeUpdate();
            $update->itemOrder = $itemOrder;
            $update->updateById($value);
            //$update->filter->andEqual($update->model->childId, $value);
            //$update->update();
            $itemOrder++;

        }

    }

}