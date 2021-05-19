<?php


namespace Nemundo\Content\Index\Tree\Com\Breadcrumb;


use Nemundo\Content\Com\Base\ContentTypeRedirectTrait;
use Nemundo\Content\Index\Tree\Reader\ParentContentTypeReader;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;


class TreeBreadcrumb extends BootstrapBreadcrumb
{

    //use ContentTypeRedirectTrait;

    /**
     * @var AbstractSite
     */
    public $redirectSite;



    // PROBLEM REDIRECT nach addparent etc.


    private $itemCount = 0;


    public function addParentContentType(AbstractContentType $contentType)
    {


        $this->itemCount++;

        if ($this->itemCount < 10) {


            $reader = new ParentContentTypeReader();
            $reader->contentType = $contentType;
            foreach ($reader->getData() as $item) {

                $this->addParentContentType($item);

                $this->addContentType($item);

                //    (new Debug())->write('parent');

                //foreach ($contentType->getParentParentContentTypeList() as $parent) {

                /*
                $site = clone($this->redirectSite);
                $site->title = $item->getSubject();
                $site->addParameter(new ContentParameter($item->getContentId()));
                $this->addSite($site);*/


            }

        }

        /*$site = clone($this->redirectSite);
        $site->title = $contentType->getSubject();
        $site->addParameter(new ContentParameter($contentType->getContentId()));
        $this->addSite($site);*/

        //}

        //$this->addActiveItem($contentType->getSubject());


    }



    public function addContentType(AbstractContentType $contentType)
    {

        $site = clone($this->redirectSite);
        $site->title = $contentType->getSubject();
        $site->addParameter(new ContentParameter($contentType->getContentId()));
        $this->addSite($site);

    }



    public function addActiveParentContentType(AbstractContentType $contentType) {

        $this->addParentContentType($contentType);
        $this->addActiveItem($contentType->getSubject());

    }


    public function addNonActiveParentContentType(AbstractContentType $contentType) {

        $this->addParentContentType($contentType);
        $this->addContentType($contentType);

    }




    /*
    public function addActiveContentType(AbstractContentType $contentType) {

        $this->addParentContentType($contentType);
        $this->addActiveItem($contentType->getSubject());

    }*/




    public function getContent()
    {


        //$this->addParentContentType($this->contentType);
        //$this->addActiveItem($this->contentType->getSubject());




        /*foreach ($this->contentType->getParentParentContentTypeList() as $parent) {

          $breadcrumb->addParentContentType($contentType);
        $breadcrumb->addActiveItem($contentType->getSubject());

            $site = clone(ItemSite::$site);
            $site->title = $parent->getSubject();
            $site->addParameter(new ContentParameter($parent->getContentId()));
            $this->addSite($site);
        }
        $this->addActiveItem($this->contentType->getSubject());*/

        return parent::getContent();

    }

}