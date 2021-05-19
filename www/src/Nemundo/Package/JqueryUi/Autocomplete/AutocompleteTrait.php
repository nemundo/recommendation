<?php


namespace Nemundo\Package\JqueryUi\Autocomplete;


use Nemundo\Package\Bootstrap\Autocomplete\AbstractAutocompleteJsonSite;
use Nemundo\Web\Site\AbstractSite;

trait AutocompleteTrait
{

    /**
     * @var int
     */
    public $minLength = 1;

    /**
     * @var int
     */
    public $delay = 0;

    /**
     * @var AbstractAutocompleteJsonSite
     */
    public $sourceSite;


    protected function checkSourceSite() {

        if (!$this->checkObject('sourceSite', $this->sourceSite, AbstractSite::class)) {
            return null;
        }

    }

}