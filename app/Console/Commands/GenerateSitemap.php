<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Post;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    // Descripción del comando
    protected $description = 'Genera el archivo sitemap.xml con los posts';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtener todos los posts
        $posts = Post::all();
        $baseUrl = config('app.url');  

        // Crear el contenido del sitemap
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($posts as $post) {
            $sitemap .= "
            <url>
                <loc>{$baseUrl}/blog/{$post->slug}</loc>
                <lastmod>{$post->updated_at->toAtomString()}</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>";
        }

        $sitemap .= '</urlset>';

        // Ruta donde se guardará el archivo sitemap.xml
        $sitemapPath = public_path('sitemap.xml');

        // Guardar el archivo sitemap.xml
        File::put($sitemapPath, $sitemap);

        // Informar que el sitemap se ha generado
        $this->info('Sitemap generado correctamente en: ' . $sitemapPath);
    }
}

