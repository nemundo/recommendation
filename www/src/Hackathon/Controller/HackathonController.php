<?php

namespace Hackathon\Controller;

use Hackathon\Site\HomeSite;
use Hackathon\Site\KeywordAutocompleteJsonSite;
use Hackathon\Site\KeywordDeleteSite;
use Hackathon\Site\NewTopicSite;
use Hackathon\Site\RssFeedSite;
use Hackathon\Site\SourceSite;
use Hackathon\Site\TopicDeleteSite;
use Hackathon\Site\TopicListSite;
use Hackathon\Site\TopicPostSite;
use Nemundo\App\Application\Site\AdminSite;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\App\Application\Site\PublicSite;
use Nemundo\App\UserAction\Site\LoginSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Blog\Site\BlogSite;
use Nemundo\Content\App\TimeSeries\Site\TimeSeriesSite;
use Nemundo\Crawler\HtmlParser\Site\HtmlParserSite;

use Nemundo\Rss\Site\RssSite;
use Nemundo\Web\Controller\AbstractWebController;

class HackathonController extends AbstractWebController
{

    protected function loadController()
    {

        (new HomeSite($this));


        //(new ServerScriptSite($this));

        (new NewTopicSite($this));


        (new TopicPostSite($this));
        (new TopicListSite($this));



        (new TopicDeleteSite($this));
        (new SourceSite($this));


        //$site = new RssFeedSite($this);



        //(new RssSite($this));


        //(new HtmlParserSite($this));


        /*(new BlogSite($this));
        (new TimeSeriesSite($this));*/

        (new AppSite($this));
        (new AdminSite($this));

        new KeywordDeleteSite($this);
new KeywordAutocompleteJsonSite($this);

        $site = new LoginSite($this);
        $site->menuActive = false;

        $site = new PublicSite($this);
        //$site->menuActive=true;



        (new UserActionSite($this));

    }
}