<?php

namespace Nemundo\Content\App\PublicShare\Action;


use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Action\AbstractActionContentView;

use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\PublicShare\Parameter\PublicShareParameter;
use Nemundo\Content\App\PublicShare\Site\PublicShareDeleteSite;
use Nemundo\Content\App\PublicShare\Site\PublicShareSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class PublicShareView extends AbstractActionContentView
{


    /**
     * @var AbstractContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewId='68a1fafb-6747-4550-9d6d-8c043fcbe59d';

        // TODO: Implement loadView() method.
    }


    public function getContent()
    {

        $reader = new PublicShareReader();
        $reader->filter->andEqual($reader->model->contentId, $this->contentType->getContentId());  // actionContentId);
        foreach ($reader->getData() as $shareRow) {

            $widget = new AdminWidget($this);
            $widget->widgetTitle = 'Public Share';

            $site = clone(PublicShareSite::$site);
            $site->addParameter(new PublicShareParameter($shareRow->id));

            $input = new BootstrapTextBox($widget);
            $input->name = 'public_url';
            $input->label = 'Public Url';
            $input->value = $site->getUrlWithDomain();


            $btn = new AdminCopyButton($widget);
            $btn->copyId = $input->name;

            // löschen
            // copy

            $btn = new AdminIconSiteButton($widget);
            $btn->site = clone(PublicShareDeleteSite::$site);
            $btn->site->addParameter(new PublicShareParameter($shareRow->id));

            //$btn->site->addParameter(new ContentParameter($shareRow->contentId));



        }

        return parent::getContent();

    }

}