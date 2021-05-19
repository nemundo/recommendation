<?php

namespace Nemundo\Html\Document;

use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Html\Container\AbstractContainer;

abstract class AbstractDocument extends AbstractContainer
{

    /**
     * @var StatusCode
     */
    public $statusCode = StatusCode::OK;

    abstract public function render();

    public function __construct()
    {
        parent::__construct(null);
    }

}
