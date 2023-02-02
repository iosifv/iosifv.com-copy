<?php
/**
 * Created by PhpStorm.
 * User: iosif
 * Date: 18/11/18
 * Time: 02:07
 */

namespace App\Interfaces;


use App\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

interface Taggable
{
    /**
     * Standard Eloquent Relationship
     *
     * @return BelongsToMany
     */
    public function tags():BelongsToMany;

    /**
     * Updates linked tags by ID
     *
     * @param array[int] $tags
     */
    public function updateTagsById(array $tags):void;

    /**
     * Updates Linked Tags by Name
     * @param array[string] $tagNames
     */
    public function updateTagsByName(array $tagNames):void;

    /**
     * Returns all elements which are linked to this tag
     *
     * @param Tag $tag
     * @return Collection
     */
    public static function getWithSimilar(Tag $tag):Collection;

    /**
     * Returns true if tag name is found within the model
     *
     * @param $name
     * @return bool
     */
    public function hasTagName(string $name):bool;
}