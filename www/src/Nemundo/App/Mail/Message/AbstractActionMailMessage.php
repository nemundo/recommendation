<?php

namespace Nemundo\App\Mail\Message;


use Nemundo\Web\Site\AbstractSite;

abstract class AbstractActionMailMessage extends MailMessage  // AbstractMailMessage
{

    /**
     * @var string
     */
    public $actionText;

    /**
     * @var string
     */
    public $actionLabel = 'View';

    /**
     * @var string
     */
    //public $actionUrl = '#';

    /**
     * @var AbstractSite
     */
    public $actionUrlSite;


}