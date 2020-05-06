<?php

/**
 * Register local fields for ACF (Advanced Custom Fields)
 * Docs: https://www.advancedcustomfields.com/resources/register-fields-via-php/
 */

acf_add_local_field_group( [
    'key' => 'group_1',
    'title' => 'My Group',
    'fields' => [
        [
            'key' => 'field_1',
            'label' => 'Sub Title',
            'name' => 'sub_title',
            'type' => 'text',
        ]
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
] );