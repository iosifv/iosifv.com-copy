<?php

namespace App\Traits;

trait SessionHelperTrait
{
    /**
     * @param string $message
     */
    private function flashError(string $message):void
    {
        \Session::flash('error', $message);
    }

    /**
     * @param string $message
     */
    private function flashSuccess(string $message):void
    {
        \Session::flash('success', $message);
    }

    /**
     * @param string $message
     */
    private function flashInfo(string $message):void
    {
        \Session::flash('info', $message);
    }
}