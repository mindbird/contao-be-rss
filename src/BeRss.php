<?php

namespace BeRss;

class BeRss extends \Backend
{
    public function addSystemMessages()
    {
        $objUser = \BackendUser::getInstance();

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

        $items = $feed->get_items(0,2);
        $output = '';

        if ($items) {
            foreach ($items as $item) {
                print 'Title: ' . $item->get_title() . '<br>';
                print 'Link: ' . $item->get_link() . '<br>';
                print 'Description: ' . $item->get_description() . '<br>';
                print 'Image: ' . print_r($item->get_image_url(), true) . '<br>';

                $template = new \BackendTemplate('be_rss_item');
            }
        }

        return $output;
    }
}
