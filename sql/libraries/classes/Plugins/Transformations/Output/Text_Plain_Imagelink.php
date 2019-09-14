<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Text Plain Image Link Transformations plugin for phpMyAdmin.
 */

namespace PhpMyAdmin\Plugins\Transformations\Output;

use PhpMyAdmin\Plugins\Transformations\Abs\TextImageLinkTransformationsPlugin;

/**
 * Handles the image link transformation for text plain.
 */
// @codingStandardsIgnoreLine
class Text_Plain_Imagelink extends TextImageLinkTransformationsPlugin
{
    /**
     * Gets the plugin`s MIME type.
     *
     * @return string
     */
    public static function getMIMEType()
    {
        return 'Text';
    }

    /**
     * Gets the plugin`s MIME subtype.
     *
     * @return string
     */
    public static function getMIMESubtype()
    {
        return 'Plain';
    }
}