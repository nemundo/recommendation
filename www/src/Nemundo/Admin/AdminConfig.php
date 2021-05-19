<?php

namespace Nemundo\Admin;


use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Web\Controller\AbstractWebController;


class AdminConfig
{

    /**
     * @var string
     */
    public static $defaultTemplateClassName = BootstrapDocument::class;

    /**
     * @var AbstractWebController
     */
    public static $webController;

    /**
     * @var string
     */
    public static $logoUrl;

    public static $showPasswordChange = true;

    /**
     * @var bool
     */
    public static $userMode = false;

    /**
     * @var bool
     */
    public static $searchMode = false;

    /**
     * @var bool
     */
    public static $webManifest=false;

}