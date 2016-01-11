<?php

if (substr($GLOBALS['TL_DCA']['tl_settings']['palettes']['default'], - 1) != ';') {
    $GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';';
}
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= '{be_rss_legend},be_rss_src;';

$GLOBALS['TL_DCA']['tl_settings']['fields']['be_rss_src'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['be_rss_src'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array(
        'mandatory' => true,
        'maxlength' => 255,
        'tl_class' => 'w50'
    )
);