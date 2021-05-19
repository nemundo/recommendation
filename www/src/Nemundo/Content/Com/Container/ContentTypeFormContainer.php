<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanel;
use Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanelContainer;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeFormContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var bool
     */
    public $appendContentParameter = false;

    public function getContent()
    {

        //$subtitle = new AdminSubtitle($this);
        //$subtitle->content = $this->contentType->typeLabel;

        if ($this->contentType!==null) {

        $tab = new BootstrapTabsPanel($this);

        $count = 0;
        foreach ($this->contentType->getFormList() as $form) {


            $hidden = new UrlRefererHiddenInput($form);


            $panel = new BootstrapTabsPanelContainer($tab);
            $panel->panelTitle = $form->formName;

            if ($count == 0) {
                $panel->active = true;
            }
            $count++;

            $panel->addContainer($form);

            $form->redirectSite = $this->redirectSite;
            $form->appendContentParameter = $this->appendContentParameter;

        }

        } else {

            $p=new Paragraph($this);
            $p->content='No Form available';

        }

        return parent::getContent();

    }

}