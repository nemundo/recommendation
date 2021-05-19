<?php

namespace Nemundo\Content\App\Share\Action\PrivateShare;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShare;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareCount;
use Nemundo\Content\Builder\ContentBuilder;


class PrivateShareAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Private Share';
        $this->typeId = '13723f6e-9dee-4ed6-983e-c74948c85ebd';
        $this->actionLabel = 'Share (private)';

        $this->viewClassList[]= PrivateShareActionView::class;
        $this->formClassList[]=PrivateShareActionForm::class;

    }


    public function onAction()
    {


    }


}