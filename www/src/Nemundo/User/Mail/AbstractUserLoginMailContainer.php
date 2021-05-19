<?php

namespace Nemundo\User\Mail;


use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractUserLoginMailContainer extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $userId;

    /**
     * @var string
     */
    public $subject;


    abstract protected function loadMailContainer();

    public function __construct(AbstractHtmlContainer $parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->loadMailContainer();
    }

}