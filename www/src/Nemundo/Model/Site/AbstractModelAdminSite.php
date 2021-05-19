<?php

namespace Nemundo\Model\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Package\Bootstrap\Admin\BootstrapModelAdmin;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractModelAdminSite extends AbstractSite
{

    /**
     * @var AbstractModel
     */
    public $model;


    public function loadContent()
    {
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        $admin = new BootstrapModelAdmin($page);
        $admin->model = $this->model;
        $page->render();
    }

}