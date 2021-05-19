<?php

namespace Nemundo\Model;


class ModelConfig
{

    /**
     * @var string
     */
    public static $dataPath;

    /**
     * @var string
     */
    public static $redirectDataPath;

    /**
     * @var string
     */
    public static $dataUrl;

    /**
     * @var int
     */
    public static $defaultPaginationLimit = 30;

    /**
     * @var bool
     */
    public static $logSlowQuery = false;

}