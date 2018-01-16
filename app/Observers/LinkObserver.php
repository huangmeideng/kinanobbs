<?php
/**
 * Created by PhpStorm.
 * User: Huangmeidneg
 * Date: 2018-1-16
 * Time: 16:35
 */

namespace App\Observers;

use App\Models\Link;
use Cache;

class LinkObserver
{
    public function saved(Link $link)
    {
        Cache::forget($link->cache_key);
    }
}