<?php

namespace Nemundo\Content\App\Explorer\Page\_Share;

use Nemundo\Content\App\Explorer\Com\Breadcrumb\ExplorerTreeBreadcrumb;
use Nemundo\Content\App\Explorer\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\Explorer\Parameter\PublicShareParameter;

use Nemundo\Content\App\Explorer\Site\_Share\PublicShareSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Header\Title;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class PublicShareEditPage extends ExplorerTemplate
{

    public function getContent()
    {


        $contentType = (new ContentParameter())->getContent(false);

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        $title = new Title($this);
        $title->content = $contentType->getSubject();

        if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {
            $breadcrumb = new ExplorerTreeBreadcrumb($layout->col1);
            $breadcrumb->contentType = $contentType;
        }

        $reader = new PublicShareReader();
        $reader->filter->andEqual($reader->model->contentId, (new ContentParameter())->getValue());
        foreach ($reader->getData() as $publicShareRow) {

            $site = clone(PublicShareSite::$site);
            $site->addParameter(new PublicShareParameter($publicShareRow->id));

            $input = new BootstrapTextBox($this);
            $input->label = 'Public Url';
            $input->value = $site->getUrlWithDomain();

        }

        return parent::getContent();
    }
}