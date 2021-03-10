<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class VideoEmbed extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'VideoEmbed';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Custom YouTube Embed block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'dashicons-embed-video';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'edit';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'youtube_id' => $this->youtube_id(),
            'video_ratio' => $this->video_ratio(),
            'video_controls' => $this->video_controls(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $videoEmbed = new FieldsBuilder('video_embed');

        $videoEmbed
        ->addUrl('youtube_id', [
            'label' => 'YouTube Video ID'
        ])
        ->addRadio('video_ratio', [
            'choices' => [
                '16/9',
                '4/3'
            ],
            'default_value' => '16/9',
        ])
        ->addRadio('video_controls')
            ->addChoices(['1' => 'Yes'], ['0' => 'No']);

        return $videoEmbed->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function youtube_id()
    {
        return get_field('youtube_id') ?: 'e-H2OfT63Q0';
    }

    public function video_ratio()
    {
        return get_field('video_ratio') ?: '16/9';
    }

    public function video_controls()
    {
        return get_field('video_controls');
    }


    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
