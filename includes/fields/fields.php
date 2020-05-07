<?php

/**
 * Register local fields for ACF (Advanced Custom Fields)
 * Docs: https://www.advancedcustomfields.com/resources/register-fields-via-php/
 */

acf_add_local_field_group([
    'key' => 'group_smvmt2020_appearance',
    'title' => 'Appearance',
    'fields' => [
        [
            'key' => 'field_smvmt2020_appearance_disable_title',
            'label' => 'Disable Title',
            'name' => 'disable_title',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => 'smvmt2020-input smvmt2020-input--inline',
                'id' => '',
            ],
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ],
        [
            'key' => 'field_smvmt2020_appearance_use_transparent_header',
            'label' => 'Use Transparent Header',
            'name' => 'use_transparent_header',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'width' => '',
                'class' => 'smvmt2020-input smvmt2020-input--inline',
                'id' => '',
            ],
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ],
        [
            'key' => 'field_smvmt2020_appearance_disable_top_spacing',
            'label' => 'Disable Top Spacing',
            'name' => 'disable_top_spacing',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => [
				[
					[
						'field' => 'field_smvmt2020_appearance_disable_title',
						'operator' => '==',
						'value' => '1',
                    ],
                ],
            ],
            'wrapper' => [
                'width' => '',
                'class' => 'smvmt2020-input smvmt2020-input--inline',
                'id' => '',
            ],
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
]);