<?php


namespace Nemundo\Web\Action\Site;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\IconSiteTrait;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;

class DeleteActionSite extends ActionSite
{

    use IconSiteTrait;

    public function __construct(AbstractActionPanel $panel)
    {
        parent::__construct($panel);
        $this->icon = new DeleteIcon();
        $this->title[LanguageCode::EN]='Delete';
        $this->title[LanguageCode::DE]='Löschen';
        $this->actionName='delete';

    }

}