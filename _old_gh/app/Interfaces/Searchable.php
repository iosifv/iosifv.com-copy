<?php
/**
 * Created by PhpStorm.
 * User: iosif
 * Date: 10/11/18
 * Time: 21:56
 */

namespace App\Interfaces;


interface Searchable
{
    /**
     * @param string $search
     * @param bool $includeTags
     * @return bool
     */
    public function hasText(string $search, bool $includeTags = true):bool;
}