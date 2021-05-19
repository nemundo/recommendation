<?php

namespace Nemundo\Content\App\Inbox\Action;


use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Html\Form\Input\TextInput;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\User\Com\ListBox\UserListBox;
use Nemundo\Web\Url\UrlBuilder;

class SendToContentForm extends AbstractContentForm
{

    /**
     * @var SendToContentAction
     */
    public $contentType;

    /**
     * @var UserListBox
     */
    private $user;

    /**
     * @var BootstrapLargeTextBox
     */
    private $message;

    public function getContent()
    {

        $this->user = new UserListBox($this);
        $this->user->validation = true;

        $this->message = new BootstrapLargeTextBox($this);
        $this->message->label = 'Message';
        $this->message->value = 'Hello ...';

        //$hidden = new TextInput($this);  // new HiddenInput($form);
        $hidden = new HiddenInput($this);
        $hidden->name = 'url_referer';

        $urlRefererRequest = new PostRequest('url_referer');
        if ($urlRefererRequest->hasValue()) {
            $hidden->value = $urlRefererRequest->getValue();
        } else {
            $hidden->value = (new UrlReferer())->getUrl();
        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $this->contentType->userId = $this->user->getValue();
        $this->contentType->message = $this->message->getValue();
        $this->contentType->onAction();


        //$hidden = new TextInput($form);  // new HiddenInput($form);
        //$hidden->name = 'url_referer';
        //$hidden->value = (new UrlReferer())->getUrl();

        $urlRefererRequest = new PostRequest('url_referer');


        //(new Debug())->write($urlRefererRequest->getValue());

        (new UrlRedirect())->redirect($urlRefererRequest->getValue());




        //if ($urlRefererRequest->hasValue()) {
            //$hidden->value = $urlRefererRequest->getValue();
          //  (new Url($urlRefererRequest->getValue()))->redirect();
        //} /*else {
          //  $hidden->value = (new UrlReferer())->getUrl();
        //}*/




        //exit;

    }

}