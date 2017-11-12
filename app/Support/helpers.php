<?php

namespace App\Support;

use Illuminate\Support\HtmlString;

if (!function_exists('format_content')) {
    /**
     * Format user content.
     *
     * @param string $text
     *
     * @return HtmlString
     */
    function format_content(string $text): HtmlString
    {
        return new HtmlString(nl2br(e($text)));
    }
}
