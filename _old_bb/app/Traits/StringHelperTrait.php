<?php
/**
 * Created by PhpStorm.
 * User: iosif
 * Date: 10/11/18
 * Time: 22:00
 */

namespace App\Traits;


trait StringHelperTrait
{
    /**
     * @param $field
     * @param string $search
     * @return bool
     */
    private function findInString($field, string $search):bool
    {
        $cleanField = strtolower(strval($field));
        $cleanSearch = strtolower(strval($search));
        if (strpos($cleanField, $cleanSearch) !== false) {
            return true;
        }
        return false;
    }

    /**
     * @param array $strings
     * @param string $search
     * @return bool
     */
    private function findInStrings(array $strings, string $search):bool
    {
        foreach ($strings as $string) {
            if ($this->findInString($string, $search)) {
                return true;
            }
        }

        return false;
    }
}