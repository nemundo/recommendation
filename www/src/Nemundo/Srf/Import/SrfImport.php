<?php


namespace Nemundo\Srf\Import;


use Nemundo\Srf\Token\SrfToken;

class SrfImport extends AbstractImport
{

    public function importData()
    {

        SrfToken::$clientId = 'ezM7Ba881g6dTnPdzY1IhAux5wNX9Cql';
        SrfToken::$clientSecret= 'jUQbFGs1e1e9bvPw';

        (new TvShowImport())->importData();

        //(new TvEpisodeImport())->importData();

        /*
        (new RadioShowImport())->importData();
        (new RadioEpisodeImport())->importData();*/

    }

}