<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Admin\Utils\Helpers;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Message;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class ContactBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\Admin
 */
class ContactBlock extends AbstractBlock
{

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Bloc de contact'),
            'description' => __('Bloc introduisant la page de contact'),
            'category'    => GutBlockName::SHARED,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'           => 'edit',
            'dir' => 'views/blocks/shared',
            'multiple' => false
        ]);
    }

    /**
     * @return Traversable
     */
    protected function registerFields(): \Traversable
    {
        yield Message::make(__('Message', ''))
            ->message(__('Cette section affiche automatiquement le bloc "Nous contacter" de <a href="/wp/wp-admin/admin.php?page=blocs_partagés">cette page</a>'));
    }

}
