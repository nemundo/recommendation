<?php

namespace Nemundo\Admin\Com\Button;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Package\Bootstrap\Button\BootstrapButtonSize;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFormStyle;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;


// SearchAdminButton
class AdminSearchButton extends AbstractHtmlContainer
{

    use BootstrapFormStyle;

    public function getContent()
    {

        //$this->tagName = 'div';
        //$this->addCssClass('pr-3');
        //$this->addCssClass('form-group');
      //  $this->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);
      //  $this->addCssClass('col');

        $this->columnSize=1;

        $this->loadStyle();


        $label = new Label($this);
        $label->addCssClass('form-label');
        $label->content =  HtmlCharacter::NON_BREAKING_SPACE;

        $btn = new BootstrapSubmitButton($this);
        $btn->size = BootstrapButtonSize::SMALL;
        $btn->label = [];
        $btn->label[LanguageCode::EN] = 'Search';
        $btn->label[LanguageCode::DE] = 'Suchen';
        $btn->addCssClass('form-control');


        //$this->query->placeholder[LanguageCode::EN] = 'Search';
        //$this->query->placeholder[LanguageCode::DE] = 'Suche';

        return parent::getContent();

    }

}