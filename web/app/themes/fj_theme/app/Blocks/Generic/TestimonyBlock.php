<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Admin\Utils\Helpers;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use App\PostTypes\Testimony;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\Relationship;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class LastRealisationsBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\Admin
 */
class TestimonyBlock extends AbstractBlock
{
    public static function getBlockName()
    {
        return 'acf/testimony-block';
    }

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Témoignages'),
            'description' => __('Bloc remontant 3 témoignages'),
            'category'    => GutBlockName::GENERIC,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'           => 'edit',
            'dir' => 'views/blocks',
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Text::make(__("Titre de la section"), "title")->required();

        yield Relationship::make('Témoignages', 'items')
            ->postTypes([Testimony::getPostType()])
            ->min(3)
            ->max(3)
            ->returnFormat('object') // id or object (default)
            ->required();
    }

}
