<?php

namespace Nemundo\Admin\Com\Button;


use Nemundo\Com\Container\ContainerUserRestrictionTrait;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

//AdminFormIcon
class AdminSearchIcon extends AbstractHtmlContainer
{


    use ContainerUserRestrictionTrait;

    /**
     * @var AbstractIconSite
     */
    public $site;

    public function getContent()
    {


        if ($this->checkUserVisibility()) {


            $this->tagName = 'div';
            $this->addCssClass('pl-3');
            $this->addCssClass('form-group');

            $label = new Label($this);
            $label->content = HtmlCharacter::NON_BREAKING_SPACE;

            $div = new Div($this);

            $icon = clone($this->site->icon);
            $icon->iconSize = 2;

            $link = new SiteHyperlink($div);
            $link->addContainer($icon);
            $link->showSiteTitle = false;
            $link->title = $this->site->title;
            $link->site = $this->site;

        }

        return parent::getContent();

    }

}