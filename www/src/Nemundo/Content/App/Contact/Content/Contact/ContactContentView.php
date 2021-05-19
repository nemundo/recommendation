<?php

namespace Nemundo\Content\App\Contact\Content\Contact;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Com\Html\Hyperlink\EmailHyperlink;
use Nemundo\Com\Html\Hyperlink\PhoneHyperlink;
use Nemundo\Content\App\Contact\Parameter\ContactParameter;
use Nemundo\Content\App\Contact\Site\BusinessCardSite;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Formatting\Small;
use Nemundo\Html\Heading\H2;

class ContactContentView extends AbstractContentView
{
    /**
     * @var ContactContentType
     */
    public $contentType;


    protected function loadView()
    {
        $this->viewName='';
        $this->viewId='';
        $this->defaultView=true;
    }

    public function getContent()
    {

        $contactRow = $this->contentType->getDataRow();

        /*$p = new Small($this);
        $p->content = 'Contact';*/

        $h2 = new H2($this);
        $h2->content = $contactRow->company;

        $h2 = new H2($this);
        $h2->content = $contactRow->lastName . ' ' . $contactRow->firstName;

        $phone = new PhoneHyperlink($this);
        $phone->phone = $contactRow->phone;

        $email = new EmailHyperlink($this);
        $email->email = $contactRow->email;

        $btn = new AdminSiteButton($this);
        $btn->site = clone(BusinessCardSite::$site);
        $btn->site->addParameter(new ContactParameter($contactRow->id));

        return parent::getContent();

    }

}