<?php

namespace Nemundo\Content\App\Store\Form;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\FormBuilder\Item\HiddenFormItem;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Web\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Workflow\App\Store\Type\AbstractStoreType;


class AbstractStoreForm extends BootstrapForm
{

    /**
     * @var AbstractStoreType
     */
    public $store;

    /**
     * @var bool
     */
    public $urlRefererRedirect = false;


    /**
     * @var HiddenFormItem
     */
    private $hidden;


    public function getContent()
    {

        if ($this->urlRefererRedirect) {
            $this->hidden = new HiddenFormItem($this);
            $this->hidden->name = 'redirect';
            if ($this->hidden->hasValue()) {
                $this->hidden->value = $this->hidden->getValue();
            } else {
                $this->hidden->value = (new UrlReferer())->getUrl();
            }
        }

        return parent::getContent();

    }


    protected function getStoreValue()
    {

    }


    protected function onSubmit()
    {

        $this->store->setValue($this->getStoreValue());

        if ($this->urlRefererRedirect) {

            $url = (new PostRequest('redirect'))->getValue();
            (new UrlRedirect())->redirect($url);

        }

    }

}