<?php

namespace Nemundo\Model\Reader\Property\File;

use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Domain\DomainInformation;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Row\AbstractDataRow;
use Nemundo\Model\Parameter\FilenameParameter;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Model\Type\File\RedirectFilenameType;
use Nemundo\Model\Type\Id\IdType;

class RedirectFilenameReaderProperty extends AbstractReaderProperty
{

    /**
     * @var RedirectFilenameType
     */
    protected $type;

    /**
     * @var IdType
     */
    private $typeId;

    public function __construct(AbstractDataRow $modelRow, $type, $typeId = null)
    {
        parent::__construct($modelRow, $type);
        $this->typeId = $typeId;
    }


    public function hasValue()
    {

        $value = false;

        //(new Debug())->write($this->getFilename());


        if (($this->getFilename() !== '') &&($this->getFilename() !== null)) {
            $value = true;
        }

        return $value;

    }

    public function getFile()
    {
        $file = new File($this->getFullFilename());
        return $file;
    }


    public function getFullFilename()
    {
        $filename = $this->modelRow->getModelValue($this->type->file);
        $filename = $this->type->file->getDataPath() . $filename;
        return $filename;
    }


    public function getFilename()
    {
        $filename = $this->modelRow->getModelValue($this->type->fileName);
        return $filename;
    }

    public function getFileExtension()
    {
        $filename = $this->modelRow->getModelValue($this->type->fileExtension);
        return $filename;
    }

    public function getFileSize()
    {
        $filename = $this->modelRow->getModelValue($this->type->fileSize);
        return $filename;
    }


    public function getUrl()
    {

        $url = '';

        if ($this->getFilename() !== '') {
            //$id = $this->modelRow->getModelValue($this->modelRow->model->id);
            $id = $this->modelRow->getModelValue($this->typeId);


            if ($this->type->redirectSite == null) {
                (new LogMessage())->writeError('Redirect Site not defined');
            }

            $site = clone($this->type->redirectSite);
            $site->addParameter(new FilenameParameter($id));
            $url = $site->getUrl();
        }
        return $url;
    }


    public function getUrlWithDomain()
    {

        $url = (new DomainInformation())->getDomain() . $this->getUrl();
        return $url;
    }

}