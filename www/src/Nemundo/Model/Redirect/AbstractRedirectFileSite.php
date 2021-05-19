<?php

namespace Nemundo\Model\Redirect;


use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Parameter\FilenameParameter;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Reader\Property\File\RedirectFileReaderProperty;
use Nemundo\Model\Type\File\RedirectFileType;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractRedirectFileSite extends AbstractSite
{

    /**
     * @var AbstractModel
     */
    protected $model;

    /**
     * @var RedirectFileType
     */
    protected $type;


    protected function loadSite()
    {

        $this->menuActive = false;

    }


    public function loadContent()
    {

        $id = (new FilenameParameter())->getValue();

        $reader = new ModelDataReader();
        $reader->model = $this->model;
        $row = $reader->getRowById($id);

        $fileProperty = new RedirectFileReaderProperty($row, $this->type);

        $fileResponse = new FileResponse();
        $fileResponse->filename = $fileProperty->getFullFilename();
        $fileResponse->responseFilename = $fileProperty->getFilename();
        $fileResponse->sendResponse();

    }

}