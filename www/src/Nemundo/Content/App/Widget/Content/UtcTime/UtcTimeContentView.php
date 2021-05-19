<?php

namespace Nemundo\Content\App\Widget\Content\UtcTime;


use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Date\Utc\UtcDateTime;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Html\Block\ContentDiv;

class UtcTimeContentView extends AbstractContentView
{

    // zu clock

    /**
     * @var UtcTimeContentType
     */
    public $contentType;

    public $viewName = 'default';


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='5cdf3158-aeeb-4331-b2fe-31a4c3d0e99c';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $div = new ContentDiv($this);
        $div->content = (new UtcDateTime())->setNow()->getTimeLeadingZero() . ' UTC';

        $div = new ContentDiv($this);
        $div->content = (new DateTime())->setNow()->getTimeLeadingZero() . ' LT';


        return parent::getContent();
    }
}