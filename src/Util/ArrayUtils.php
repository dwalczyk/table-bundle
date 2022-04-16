<?php

namespace DWalczyk\Table\Util;

class ArrayUtils
{
    /**
     * @param string $indexSeperatedWithDots - for array e.g. [
     *  'gender' => [
     *      'man => [...]
     * ] it ll be gender.man
     */
    public static function getRecursive(array $haystack, string $indexSeperatedWithDots): mixed
    {
        $explodedIndexes = explode('.', $indexSeperatedWithDots);

        if (self::isset($haystack, $indexSeperatedWithDots)) {

        }
    }

    public static function get(array $haystack, string $index): mixed
    {
        return (self::isset($haystack, $index)) ? $haystack[$index] : null;
    }

    public static function isset(array $haystack, string $index): bool
    {
        return isset($haystack[$index]);
    }
}