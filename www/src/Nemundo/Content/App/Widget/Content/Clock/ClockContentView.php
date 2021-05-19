<?php

namespace Nemundo\Content\App\Widget\Content\Clock;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\DateTime\DateTime;

class ClockContentView extends AbstractContentView
{
    /**
     * @var ClockContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='11525c02-c84d-4d55-bf9b-82a412f66a4a';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $title = new AdminTitle($this);
        $title->content = (new DateTime())->setNow()->getTimeLeadingZero();

        // Timezone

        /*
  $div = new Div($this);
  $bold = new Bold($div);
  $bold->content = (new UtcDateTime())->setNow()->getLocalDateTime(Timezone::ZURICH)->getTimeLeadingZero().' LT';
*/


        return parent::getContent();

    }
}