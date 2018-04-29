<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 29/4/2561
 * Time: 15:05 น.
 */

namespace Suilven\RSS\Controller;


use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\RSS\RSSFeed;

class RSSFeedController extends ContentController
{
 //   private static $allowed_actions = [
 //       'index'
 //   ];

    public function init()
    {

        parent::init();

 // RSSFeed::linkToFeed($this->Link() . "rss", "25 Most Recently Updated Pages");

    }

    public function index()
    {
        $rss = new RSSFeed(
            $this->LatestUpdates(),
            $this->Link(),
            "25 Most Recently Created Pages",
            "Shows a list of the 25 most recently updated pages."
        );

        return $rss->outputToBrowser();
    }

    public function LatestUpdates()
    {
        return \Page::get()->sort("Created", "DESC")->limit(25);
    }
}
