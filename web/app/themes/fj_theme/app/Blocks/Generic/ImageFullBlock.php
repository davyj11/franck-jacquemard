<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use WordPlate\Acf\Fields\Image;

/**
 * Class ImageFullBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\FlexibleLayout
 */
class ImageFullBlock extends AbstractBlock
{

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Image pleine largeur'),
            'description' => __("Bloc contenant une image de la largeur de l'écran"),
            'category'    => GutBlockName::GENERIC,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'        => 'edit'
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Image::make(__("Image"), "img")
            ->library("all")
            ->previewSize("medium")
            ->returnFormat('array')
            ->required();
    }


}
