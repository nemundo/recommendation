<?php

namespace Nemundo\Srf\App\Livestream\Content\TvLivestream;

use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Srf\App\Livestream\Content\AbstractLivestreamContentType;

class TvLivestreamContentType extends AbstractLivestreamContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'TvLivestream';
        $this->typeId = '5c92315b-9057-4d38-8b70-3a22ad0af50b';
        $this->formClassList[] = TvLivestreamContentForm::class;
        $this->viewClassList[] = TvLivestreamContentView::class;
    }

}