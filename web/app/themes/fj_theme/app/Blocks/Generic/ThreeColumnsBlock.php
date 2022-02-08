<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use Traversable;
use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\RadioButton;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class TextImageBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\FlexibleLayout
 */
class ThreeColumnsBlock extends AbstractBlock
{
    public static function getBlockName()
    {
        return 'acf/three-columns-block';
    }

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Bloc 3 colonnes'),
            'description' => __('Description : Bloc avec 3 colonnes de textes sous forme de cards'),
            'category'    => GutBlockName::GENERIC,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'        => 'edit',
            'dir' => 'views/blocks',
        ]);
    }

    /**
     * @return Traversable
     */
    protected function registerFields(): \Traversable
    {
        yield Text::make(__("Titre de la section"), "title")->required();
        yield Textarea::make(__("Texte de la section (optionnel)"), "text");
        yield Repeater::make(__('Colonnes'), 'columns')
            ->fields([
                Text::make(__("Titre de la colonne"), "title")->required(),
                WysiwygEditor::make(__("Texte de la colonne"), "text")
                    ->required()
                    ->mediaUpload(false)
                    ->toolbar('simple'),
            ])
        ->min(3)->max(3);

    }

}
