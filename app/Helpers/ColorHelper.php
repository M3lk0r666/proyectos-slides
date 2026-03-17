<?php

use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

class ColorHelper
{
    public static function getDominantColor($path)
    {
        $palette = Palette::fromFilename($path);
        $extractor = new ColorExtractor($palette);
        $colors = $extractor->extract(1);
        $rgb = $palette->getColor($colors[0]);
        return sprintf("#%02x%02x%02x", $rgb[0], $rgb[1], $rgb[2]);
    }
}
