<?php

add_action('acf/init', 'themes_acf_init_block_types');
function themes_acf_init_block_types()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

//        acf_register_block_type(array(
//            'name' => 'gallery-block',
//            'title' => __('Gallery for About '),
//            'description' => __('A gallery Block.'),
//            'render_template' => 'template-parts/blocks/gallery-block.php',
//            'category' => 'formatting',
//            'icon' => 'admin-comments',
//            'keywords' => array('hero', 'quote'),
//            'enqueue_assets' => function () {
//                wp_enqueue_style('volpis-swiper-css');
//                wp_enqueue_script('volpis-swiper-js');
//                wp_enqueue_script('volpis-gallery-js');
//            },
//        ));


    }
}


function get_block_data($post, $block_name = 'core/heading', $field_name = "")
{
    $content = "";
    if (has_blocks($post->post_content) && !empty($field_name)) {
        $blocks = parse_blocks($post->post_content);
        foreach ($blocks as $block) {

            if ($block['blockName'] === $block_name) {

                if (isset($block["attrs"]["data"][$field_name])) {
                    $content = $block["attrs"]["data"][$field_name];
                }
            }
        }
    }
    return $content;
}