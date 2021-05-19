<?php

namespace Nemundo\Content\App\Explorer\Content\Container;

use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Content\Container\View\ContainerContentView;
use Nemundo\Content\App\Explorer\Content\Container\View\StreamContainerContentView;
use Nemundo\Content\App\Explorer\Data\Container\Container;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Core\Random\UniqueId;

class ContainerContentType extends AbstractContainerContentType
{

    public $container;

    public $description;

    protected function loadContentType()
    {

        $this->typeLabel = 'Container';
        $this->typeId = '7b224ca7-6cb5-4abf-a8eb-87b38e36ae96';
        $this->formClassList[] = ContainerContentForm::class;
        $this->formClassList[]=ContentSearchForm::class;
        $this->viewClassList[] = ContainerContentView::class;
        $this->viewClassList[] = StreamContainerContentView::class;

        $this->viewSite=ExplorerSite::$site;

    }


    protected function onCreate()
    {

        $this->dataId = (new UniqueId())->getUniqueId();

        $data =new Container();
        $data->id = $this->dataId;
        $data->container = $this->container;
        $data->description = $this->description;
        $data->save();

    }

}