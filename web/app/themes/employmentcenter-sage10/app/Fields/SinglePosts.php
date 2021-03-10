<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class SinglePosts extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $singlePosts = new FieldsBuilder('single_posts', ['position' => 'side']);

        $singlePosts
        ->setLocation('post_type', '==', 'post')
        ->or('post_type', '==', 'page');

        $singlePosts
        ->addCheckbox('hide_title', [
            'choices' => [
                'Yes'
            ],
        ]);

        return $singlePosts->build();
    }
}
