<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Admin\Utils\Helpers;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\TrueFalse;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class WysiwygBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\Admin
 */
class TitleTextBlock extends AbstractBlock
{

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Titre à gauche + texte à droite'),
            'description' => __('Bloc de texte avec titre'),
            'category'    => GutBlockName::GENERIC,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'           => 'edit'
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Tab::make(__('Contenu'));
        yield Text::make(__("Titre"), "title")->required();

        yield WysiwygEditor::make(__("Description"), "text")
            ->tabs('visual')
            ->mediaUpload(false)
            ->required();

        yield \AcfUtils::button();

        yield Tab::make(__('Mise en page'));
        yield \AcfUtils::withBg();
    }

}
