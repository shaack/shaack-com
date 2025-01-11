<?php
/**
 * Author and copyright: Stefan Haack (https://shaack.com)
 * Repository: https://github.com/shaack/reboot-cms
 * License: MIT, see file 'LICENSE'
 */

namespace Shaack\Utils;

class HttpUtils
{
    public static function sanitizeFileName(string $content): string
    {
        return preg_replace('/[^a-zA-Z0-9_\-]/', '', $content);
    }

    public static function sanitizeHttpParam(string $content): string
    {
        return htmlentities($content);
    }
}