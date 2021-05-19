<?php


namespace Nemundo\Content\Com\HyperlinkList;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class ApplicationContentTypeCollectionHyperlinkList extends BootstrapHyperlinkList
{

    /**
     * @var AbstractContentTypeCollection
     */
    public $applicationId;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    public function getContent()
    {

        if ($this->redirectSite == null) {
            $this->redirectSite = new Site();
        }

        $reader = new ContentTypeReader();
        $reader->filter->andEqual($reader->model->applicationId, $this->applicationId);
        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {

            $contentType = $contentTypeRow->getContentType();
            if ($contentType->hasAdmin()) {

                if ($contentType->typeId == (new ContentTypeParameter())->getValue()) {
                    $this->addActiveHyperlink($contentType->typeLabel);
                } else {
                    $site = clone($this->redirectSite);
                    $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
                    $site->addParameter(new ApplicationParameter());
                    $site->title = $contentType->typeLabel;
                    $this->addSite($site);
                }

            }

        }

        return parent::getContent();

    }

}