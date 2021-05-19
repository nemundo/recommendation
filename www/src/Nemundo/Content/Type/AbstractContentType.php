<?php


namespace Nemundo\Content\Type;

use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Content\View\Listing\ContentListing;
use Nemundo\Core\Language\Translation;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Html\Container\AbstractContainer;


abstract class AbstractContentType extends AbstractType
{

    use ContentIndexTrait;

    /**
     * @var string[]
     */
    public static $indexBuilderClass=[];


    public function addIndexBuilderClass($className) {



    }




    /**
     * @var string
     */
    protected $listingClass;

    /**
     * @var string
     */
    protected $adminClass;


    public function __construct($dataId = null)
    {

        $this->listingClass = ContentListing::class;

        parent::__construct($dataId);
    }


    public function saveType()
    {

        $this->saveData();
        $this->saveContent();


        // für update !!!
        //$this->getDataRow();

        $this->saveContentIndex();


        $this->saveIndex();

        $this->runEvent();

        return $this;

    }


    public function getSubject()
    {

        $subject = '[No Content Type]';

        if ($this->typeLabel !== null) {
            $subject = (new Translation())->getText($this->typeLabel);
        }

        return $subject;

    }


    public function getText()
    {

        $text = '';
        return $text;

    }


    public function hasList()
    {

        $value = false;
        if ($this->listingClass !== null) {
            $value = true;
        }

        return $value;

    }


    public function getListing(AbstractContainer $parent)
    {

        /** @var AbstractContentListing $list */
        $list = new $this->listingClass($parent);
        $list->contentType = $this;

        return $list;

    }


    public function hasAdmin()
    {

        return $this->hasProperty($this->adminClass);

    }


    public function getAdmin(AbstractContainer $parent)
    {

        $admin = null;
        if ($this->hasAdmin()) {

            /** @var AbstractContentAdmin $admin */
            $admin = new $this->adminClass($parent);
            $admin->contentType = $this;


        } else {
            (new LogMessage())->writeError('No Admin Class. Class: ' . $this->getClassName());
        }

        return $admin;

    }


    protected function hasProperty($class)
    {

        $value = false;
        if ($class !== null) {
            $value = true;
        }

        return $value;

    }


    // getReaderData
    // getData

    public function getDataReader()
    {
        (new LogMessage())->writeError('getDataReader not defined');
    }


    public function deleteType()
    {

        parent::deleteType();
        $this->deleteContent();

    }

}