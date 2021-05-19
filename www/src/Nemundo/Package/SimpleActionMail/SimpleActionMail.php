<?php

namespace Nemundo\Package\SimpleActionMail;


use Nemundo\App\Mail\Message\MailMessage;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Heading\H1;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Document\HtmlDocument;


class SimpleActionMail extends MailMessage
{


    public $actionLabel;

    public $actionUrl;


    public function sendMail()
    {

        $html = new HtmlDocument();

        $h1 = new H1($html);
        $h1->content = $this->subject;

        $p = new Paragraph($html);
        $p->content = $this->text;

        $link = new UrlHyperlink($html);
        $link->url = $this->actionUrl;

        $bold = new Bold($link);
        $bold->content = $this->actionLabel;


        $this->text = $html->getContent();

        return parent::sendMail();

    }


}