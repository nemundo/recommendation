<?php


namespace Nemundo\Crawler\HtmlParser\Page;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Crawler\HtmlParser\HtmlParser;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class HtmlParserPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $input = new BootstrapTextBox($formRow);
        $input->name = 'url';
        $input->label = 'Url';
        $input->searchMode = true;

        new AdminSearchButton($formRow);


        if ($input->hasValue()) {

            $crawler = new HtmlParser();
            $crawler->fromUrl($input->getValue());

            $table = new AdminLabelValueTable($this);
            $table->addLabelValue('Title', $crawler->getPageTitle());
            $table->addLabelValue('Description', $crawler->getDescription());

            $ul = new UnorderedList();

            foreach ($crawler->getRssFeed() as $rssUrl) {
                $ul->addText($rssUrl);
            }

            $table->addLabelCom('Rss Feed', $ul);


        }


        return parent::getContent();

    }

}