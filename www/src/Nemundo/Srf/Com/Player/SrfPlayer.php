<?php

namespace Nemundo\Srf\Com\Player;


use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Html\Iframe\Iframe;
use Nemundo\Web\Parameter\UrlParameter;


class SrfPlayer extends Iframe
{

    /**
     * @var string
     */
    public $urn;

    /**
     * @var bool
     */
    public $autoPlay = false;

    /**
     * @var bool
     */
    public $legacy = false;

    public function getContent()
    {

        $this->width = '100%';
        $this->height= '100%';
        $this->addAttributeWithoutValue('allowfullscreen');


        /*
        width="100%"
    height="100%"
    frameborder="0"
    allowfullscreen>
        */

        // http://tp.srgssr.ch/assets/docs/index.html


       // $url = '//tp.srgssr.ch/p/srf/embed?urn=urn:srf:video:' . $this->videoId;

//        $url = new UrlBuilder('http://tp.srgssr.ch/p/srf/portal-detail');
        //$url = new UrlBuilder('//tp.srgssr.ch/p/srf/portal-detail');
//        $url = new UrlBuilder('http://tp.srgssr.ch/p/embed');  //?urn={urn}[&{request-parameters}]"')
        $url = new UrlBuilder('//tp.srgssr.ch/p/embed');  //?urn={urn}[&{request-parameters}]"')

        $url->addRequestValue('urn', $this->urn);

        if ($this->autoPlay) {
            $url->addRequestValue('autoplay','true');
        }

        if ($this->legacy) {
            $url->addRequestValue('legacy','true');
        }


        // show more video


        //$this->src = $url->getUrlWithoutEncoding();
        $this->src = $url->getUrl();

        return parent::getContent();

    }


}