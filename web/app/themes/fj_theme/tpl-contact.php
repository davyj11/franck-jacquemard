<?php

/* Template Name: Contact */

namespace App;

use App\Http\Controllers\Controller;
use App\Http\Lumberjack;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Timber\Timber;

class TplContactController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();

        $context['page'] = $page;
        $context['title'] = $page->title;
        $context['content'] = $page->content;
        $context['flex_content'] = $page->meta('flex_content');

        $template = Lumberjack::passwordRender('templates/standard/standard.html.twig', $page->ID);
        return new TimberResponse($template, $context);

    }
}
