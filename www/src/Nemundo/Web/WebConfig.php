<?php

namespace Nemundo\Web;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Web\Template\Forbidden403Page;
use Nemundo\Web\Template\NotFound404Page;

class WebConfig extends AbstractBaseClass
{

    /**
     * @var string
     */
    public static $domain;

    /**
     * @var string
     */
    public static $webPath;

    /**
     * @var string
     */
    public static $webUrl = '/';

    /**
     * @var string
     */
    public static $notFound404Page = NotFound404Page::class;
    // notFoundPageClass

    /**
     * @var string
     */
    public static $forbidden403Page = Forbidden403Page::class;
// forbidden403PageClass


}