<?php

namespace Nemundo\Admin\Com\Card;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Hyperlink\Hyperlink;

class ToggleAdminCard extends AdminCard
{

    use LibraryTrait;

    /**
     * @var bool
     */
    public $hideAtStartup = true;


    public function getContent()
    {

        $this->headerDiv->id = 'header-' . $this->id;
        $this->contentDiv->id = 'content-' . $this->id;

        $link = new Hyperlink($this->headerDiv);
        $link->id = 'btn-' . $this->id;
        $link->title = 'Show more';
        $link->href = '#/';
        $link->addCssClass('text-dark');
        $link->tabindex=-1;

        $bold = new Bold($link);
        $bold->content = $this->title;

        if ($this->hideAtStartup) {
            $this->addStyle('#' . $this->contentDiv->id . ' {');
            $this->addStyle('display: none;');
            $this->addStyle('}');
        }

        $this->addJqueryScript('$("#' . $this->headerDiv->id . '").click(function(){');
        $this->addJqueryScript('$("#' . $this->contentDiv->id . '").toggle();');
        $this->addJqueryScript('});');

        $this->title = null;

        return parent::getContent();

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->contentDiv->addContainer($container);

    }


}