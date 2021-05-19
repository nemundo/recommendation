<?php


namespace Nemundo\Admin\Com\Hyperlink;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Web\Site\AbstractSite;

class AdminFormRowHyperlink extends AbstractHtmlContainer
{

    public $label;

    /**
     * @var AbstractSite
     */
    public $site;

    public function getContent()
    {

        $this->tagName = 'div';
        $this->addCssClass('pl-3');
        $this->addCssClass('form-group');

        $label = new Label($this);
        $label->content = $this->label;  // HtmlCharacter::NON_BREAKING_SPACE;

        $div = new Div($this);


        $link = new SiteHyperlink($div);
        $link->site = $this->site;

        return parent::getContent();

    }

}