<?php

if (!function_exists("otherLangs")) {
    function otherLangs() {
        $langs = [
            "lv",
            "ru",
            "en",
        ];

        unset($langs[array_search(app()->getLocale(), $langs)]);

        return $langs;
    }
}
