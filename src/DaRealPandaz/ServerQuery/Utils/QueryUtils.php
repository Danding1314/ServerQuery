<?php

/** @author DaRealPandaz */
namespace DaRealPandaz\ServerQuery\Utils;

class QueryUtils {

    static function isEven(int $number): bool {
        return $number % 2 == 0;
    }

    static function isOdd(int $number): bool {
        return $number % 2 != 0;
    }

}