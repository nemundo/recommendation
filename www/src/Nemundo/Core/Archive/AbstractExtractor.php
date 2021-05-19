<?php

namespace Nemundo\Core\Archive;


use Nemundo\Core\Base\AbstractBase;


abstract class AbstractExtractor extends AbstractBase
{

    /**
     * @var string
     */
    public $archiveFilename;

    /**
     * @var string
     */
    public $extractPath;

    // extractArchive()
    abstract public function extract();


}