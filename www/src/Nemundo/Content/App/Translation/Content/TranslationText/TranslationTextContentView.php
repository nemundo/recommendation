<?php

namespace Nemundo\Content\App\Translation\Content\TranslationText;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Content\App\Translation\Content\Language\LanguageContentType;
use Nemundo\Content\View\AbstractContentView;

class TranslationTextContentView extends AbstractContentView
{
    /**
     * @var TranslationTextContentType
     */
    public $contentType;
    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }
    public function getContent()
    {

        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Translation Id', $this->contentType->getDataId());
        $table->addEmpty();

        foreach ((new LanguageContentType())->getDataReader() as $languageRow) {
            $table->addLabelValue($languageRow->language, $this->contentType->getTranslationText($languageRow->id));
        }

        return parent::getContent();

    }

}