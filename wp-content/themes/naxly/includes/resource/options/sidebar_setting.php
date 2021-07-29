<?php

return array(

    'title'         => esc_html__( 'Custom Sidebar Settings', 'naxly' ),
    'id'            => 'sidebar_setting',
    'desc'          => '',
    'icon'          => 'el el-indent-left',
    'fields'        => array(
        array(
            'id' => 'custom_sidebar_name',
            'type' => 'multi_text',
            'title' => esc_html__('Dynamic Custom Sidebar', 'naxly'),
            'desc' => esc_html__('This section is used to create custom sidebar', 'naxly')
            ),
    ),
);

