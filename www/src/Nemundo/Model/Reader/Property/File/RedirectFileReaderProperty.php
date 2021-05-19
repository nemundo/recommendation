<?php

namespace Nemundo\Model\Reader\Property\File;

use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Model\Parameter\FilenameParameter;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Model\Type\File\RedirectFileType;
use Nemundo\Core\Http\Domain\DomainInformation;

class RedirectFileReaderProperty extends AbstractReaderProperty
{

    /**
     * @var RedirectFileType
     */
    protected $type;


    public function getFile()
    {
        $file = new File($this->getFullFilename());
        return $file;
    }


    public function getFullFilename()
    {
        $filename = $this->modelRow->getModelValue($this->type);
        $filename = $this->type->getDataPath() . $filename;
        return $filename;
    }


    public function getFilename()
    {
        $filename = $this->modelRow->getModelValue($this->type);
        return $filename;

    }


    public function getUrl()
    {

        $id = $this->modelRow->getModelValue($this->modelRow->model->id);


        if ($this->type->redirectSite == null) {
            (new LogMessage())->writeError('Redirect Site not defined');
        }


        $site = clone($this->type->redirectSite);
        $site->addParameter(new FilenameParameter($id));
        $url = $site->getUrl();

        return $url;
    }


    public function getUrlWithDomain()
    {
        $url = (new DomainInformation())->getDomain() . $this->getUrl();
        return $url;
    }










    /**
     * @var string
     */
    //public $filename;

    //public $url;


    //private $id;


   /* public function __construct($id, $filename, $type)
    {

        $this->id = $id;
        $this->filename = $filename;
        $this->type = $type;

    }*/


    /*
    public function getFile()
    {
        $file = new File($this->getFullFilename());
        return $file;
    }
/*/

  /*  public function getFilename()
    {

       //$filename = $this->modelRow->getModelValue($this->type);  //, $this->modelRow->model->getPrefix());



        return $this->filename;
    }


    // getSite() !!!!

    public function getUrl()
    {

        if ($this->type->redirectSite == null) {
            (new LogMessage())->writeError('Redirect Site not defined. Add the RedirectSite to the Controller');
            return;
        }


        //$id = $filename = $this->modelRow->getId();  //$this->modelRow->model->getPrefix());
        //$id = $this->modelRow->getModelValue()

        //$id =$this->modelRow->getModelValue($this->modelRow->model->id);
        $site = clone($this->type->redirectSite);
        $site->addParameter(new FilenameParameter($this->id));
        $url = $site->getUrl();
        return $url;
    }


    public function getUrlWithDomain()
    {
        $url = (new Domain())->getDomain() . $this->getUrl();
        return $url;
    }


    public function getFullFilename()
    {
        $fullFilename = $this->type->getDataPath() . $this->filename;  // $this->getFilename();
        return $fullFilename;
    }*/

}