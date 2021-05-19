<?php

namespace Nemundo\Com\FormBuilder;

use Nemundo\Com\ComConfig;
use Nemundo\Com\Container\ContainerUserRestrictionTrait;
use Nemundo\Com\FormBuilder\Item\AbstractFormBuilderItem;
use Nemundo\Com\FormBuilder\Item\AbstractFormItemBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\Http\Request\RequestMethod;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Html\Form\AbstractForm;
use Nemundo\Html\Form\FormMethod;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Web\Url\UrlRefresh;

abstract class AbstractFormBuilder extends AbstractForm
{

    use ContainerUserRestrictionTrait;
    use RedirectTrait;

    abstract protected function onSubmit();


    public function getContent()
    {

        $this->checkContainerVisibility();

        $hiddenInputFieldName = 'submit_' . ComConfig::$submitFormCount;
        ComConfig::$submitFormCount++;

        $this->formMethod = FormMethod::POST;

        $hiddenParameter = new PostRequest($hiddenInputFieldName);

        if ($hiddenParameter->existsRequest()) {

            if ($this->onValidate()) {

                if ((new RequestMethod())->getRequestMethod() !== FormMethod::POST) {
                    (new LogMessage())->writeError('No valid Post Request');
                    exit;
                }

                $this->onSubmit();

                // Kein Redirect, falls Error Meldung angezeigt werden
                if (LogConfig::$errorMessageOccurs) {
                    exit;
                }

                $this->checkRedirect();

                // Refresh Page (Verhinderung von erneutem Senden des Formular
                (new UrlRefresh())->refresh();

            }

        }

        $hidden = new HiddenInput($this);
        $hidden->name = $hiddenInputFieldName;

        return parent::getContent();

    }


    protected function onValidate()
    {

        $returnValue = true;

        /** @var AbstractFormItemBase $com */
        foreach ($this->getContainerList(true) as $com) {

            if ($com->isObjectOfClass(AbstractFormBuilderItem::class)) {
                if (!$com->checkValue()) {
                    $returnValue = false;
                }
            }
        }

        return $returnValue;

    }

}