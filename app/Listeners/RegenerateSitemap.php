<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Support\Facades\Artisan;

class RegenerateSitemap
{
    public function handle(PostCreated $event)
    {
        Artisan::call('sitemap:generate');
    }
}
