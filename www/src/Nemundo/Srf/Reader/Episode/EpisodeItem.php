<?php


namespace Nemundo\Srf\Reader\Episode;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;

class EpisodeItem extends AbstractBase
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description='';

    /**
     * @var string
     */
    public $imageUrl;

    /**
     * @var string
     */
    public $urn;

    /**
     * @var DateTime
     */
    public $dateTime;

    public $podcastUrl;


    public $length;


    /*
[id] => 32ab4f2e-c127-4a39-8e85-16ed4d1727d4
[mediaType] => AUDIO
[vendor] => SRF
[urn] => urn:srf:audio:32ab4f2e-c127-4a39-8e85-16ed4d1727d4
[title] => «Das war ein Dolchstoss für Nordmazedonien»
[description] => Frankreich hat mit seinem Veto EU-Beitrittsverhandlungen mit Nordmazedonien verhindert. Nun betreibt der Präsident des EU-Parlaments, David Sassoli, Schadensbegrenzung in Skopje. Gespräch mit dem Analysten Bodo Weber, vom Democratization Policy Council.
[imageUrl] => https://il.srgssr.ch/integrationlayer/2.0/image-scale-sixteen-to-nine/https://www.srf.ch/static/radio/modules/data/pictures/srf-4/international/2019/11-2019/601072.191104_echo_david_sassoli_key-624.jpg
[imageTitle] => «Das war ein Dolchstoss für Nordmazedonien»
[imageCopyright] => Keystone
[type] => EPISODE
[date] => 2019-11-04T18:00:00+01:00
[duration] => 361000*/


}