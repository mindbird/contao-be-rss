<?php

if (substr($GLOBALS['TL_DCA']['tl_settings']['palettes']['default'], - 1) != ';') {
    $GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';';
}
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= '{be_changelog_legend},be_changelog_src;';

$GLOBALS['TL_DCA']['tl_settings']['fields']['be_changelog_src'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['be_changelog_src'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array(
        'mandatory' => true,
        'maxlength' => 255,
        'tl_class' => 'w50'
    )
);