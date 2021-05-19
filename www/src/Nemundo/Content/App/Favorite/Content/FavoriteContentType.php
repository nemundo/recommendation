<?php


namespace Nemundo\Content\App\Favorite\Content;



use Nemundo\Content\App\Favorite\Com\Container\FavoriteContainer;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Type\AbstractContentType;


class FavoriteContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeId = 'e939872a-45a7-4ff0-837d-6091e15a57a4';
        $this->typeLabel = 'Favorite';
        $this->listingClass = FavoriteContainer::class;
        $this->formClassList[] = FavoriteContentForm::class;
    }


    public function getSubject()
    {

        $subject = '';

        $contentReader= new ContentReader();
        $contentReader->model->loadUser();
        foreach ($contentReader->getData() as $contentRow) {
        //$contentRow =$contentReader->getRowById($this->dataId);
        $subject = 'Wurde von '.$contentRow->user->login.' zu den Favoriten hinzugefügt';
        }


        return $subject;

    }

}