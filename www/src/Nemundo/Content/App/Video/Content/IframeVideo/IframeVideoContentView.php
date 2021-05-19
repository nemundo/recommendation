<?php

namespace Nemundo\Content\App\Video\Content\IframeVideo;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Iframe\Iframe;
use Nemundo\Package\Bootstrap\Helper\Ratio\BootstrapRatioDiv;

class IframeVideoContentView extends AbstractContentView
{
    /**
     * @var IframeVideoContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='eaf6cb51-a16a-463a-af42-2556661c1e87';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $div = new BootstrapRatioDiv($this);

        $iframe = new Iframe($div);
        $iframe->src = $this->contentType->getDataRow()->sourceUrl;
        $iframe->addAttributeWithoutValue('allowfullscreen');


        return parent::getContent();
    }
}