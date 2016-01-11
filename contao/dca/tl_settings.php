<?php

if (substr($GLOBALS['TL_DCA']['tl_settings']['palettes']['default'], - 1) != ';') {
    $GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';';
}
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= '{be_rss_legend},be_rss_src,be_rss_max,be_rss_headline;';

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

$GLOBALS['TL_DCA']['tl_settings']['fields']['be_rss_max'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['be_rss_max'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array(
        'mandatory' => true,
        'maxlength' => 3,
        'tl_class' => 'w50',
        'rgxp' => 'digit'
    )
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['be_rss_headline'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['be_rss_headline'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array(
        'mandatory' => true,
        'tl_class' => 'clr'
    )
);