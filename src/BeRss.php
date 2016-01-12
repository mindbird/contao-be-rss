<?php

namespace BeRss;

class BeRss extends \Backend
{
    public function addSystemMessages()
    {
        if ($GLOBALS['TL_CONFIG']['be_rss_src'] == '') {
            return '';
        }

        $feed = new \SimplePie();
        $feed->set_feed_url($GLOBALS['TL_CONFIG']['be_rss_src']);
        $feed->set_output_encoding(\Config::get('characterSet'));
        $feed->set_cache_location(TL_ROOT . '/system/tmp');
        $feed->enable_cache(true);

        if (!$feed->init())
        {
            $this->log('Error importing RSS feed "' . $this->rss_feed . '"', __METHOD__, TL_ERROR);
            return '';
        }

        $items = $feed->get_items(0, ($GLOBALS['TL_CONFIG']['be_rss_src'] ? $GLOBALS['TL_CONFIG']['be_rss_src'] : 3));
        $output = '';

        if ($items) {
            foreach ($items as $item) {
                $template = new \BackendTemplate('be_rss_item');
                $template->title = $item->get_title();
                $template->link = $item->get_link();
                $template->content = $item->get_content();
                $output .= $template->parse();
            }
        }

        $template = new \BackendTemplate('be_rss');
        $template->headline = $GLOBALS['TL_CONFIG']['be_rss_headline'];
        $template->items = $output;

        return $template->parse();
    }
}
