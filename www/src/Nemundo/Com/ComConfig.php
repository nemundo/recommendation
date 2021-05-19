<?php

namespace Nemundo\Com;


class ComConfig
{


    /**
     * Gibt Html Response aus
     * @var bool
     */
    public static $showHtmlResponse = true;


    // to do: Counter Class
    public static $comCount = 0;

    public static $submitFormCount = 0;


    public static $currentFormMethod;


    public static $errorMessageIsValue = 'Kein gültiger Wert eingegeben';

    public static $errorMessageUrl = 'Keine gültige Url';

    public static $errorMessageEmail = 'Keine gültige eMail Adresse';

    public static $errorMessageNumber = 'Keine gültige Nummer';

    public static $errorMessageFile = 'Keine Datei hochgeladen';


}