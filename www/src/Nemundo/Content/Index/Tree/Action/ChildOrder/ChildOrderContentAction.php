<?php

namespace Nemundo\Content\Index\Tree\Action\ChildOrder;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\Explorer\Site\ChildOrderSite;
use Nemundo\Content\Index\Tree\Site\Sortable\ContentSortableSite;

class ChildOrderContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        // Sortable
        $this->typeLabel='Child Order Content Action';
        $this->typeId='3784eeb2-8f7a-41de-8e0a-4a49bb63933f';

        $this->actionLabel='Child Order';
        $this->viewSite = ContentSortableSite::$site;  // ChildOrderSite::$site;

        // TODO: Implement loadContentType() method.
    }

}