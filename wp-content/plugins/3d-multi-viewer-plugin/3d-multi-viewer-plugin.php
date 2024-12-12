<?php
/**
 * Plugin Name: 3D Multi-Viewer Plugin
 * Description: A WordPress plugin to embed Spline, Sketchfab, and GLTF models.
 * Version: 1.1
 * Author: Your Name
 */

// Enqueue scripts and styles
function multi_viewer_enqueue_assets() {
    // Enqueue Three.js library
    wp_enqueue_script(
        'three-js',
        'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js',
        array(),
        '128',
        true
    );

    // Enqueue GLTFLoader as a module
    wp_enqueue_script(
        'gltf-loader',
        'https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js',
        array('three-js'),
        '128',
        true
    );

    // Enqueue the custom viewer script
    wp_enqueue_script(
        'gltf-viewer',
        plugin_dir_url(__FILE__) . 'js/gltf-viewer.js',
        array('three-js', 'gltf-loader'),
        '1.1.0',
        true
    );

    // Enqueue the plugin stylesheet
    wp_enqueue_style('multi-viewer-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action('wp_enqueue_scripts', 'multi_viewer_enqueue_assets');

// Shortcode handler
function multi_viewer_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'type' => 'gltf',  // Type: 'gltf', 'spline', or 'sketchfab'
            'src' => '',       // URL of the model or embed iframe source
            'width' => '100%', // Viewer width
            'height' => '500px' // Viewer height
        ),
        $atts
    );

    // Error handling for missing model URL
    if (empty($atts['src'])) {
        return '<p>Error: No model URL provided.</p>';
    }

    // Handle each model type
    switch ($atts['type']) {
        case 'spline':
            return '<iframe src="' . esc_url($atts['src']) . '" frameborder="0" style="width:' . esc_attr($atts['width']) . '; height:' . esc_attr($atts['height']) . ';"></iframe>';
        
        case 'sketchfab':
            return '<iframe src="' . esc_url($atts['src']) . '" frameborder="0" allow="autoplay; fullscreen" style="width:' . esc_attr($atts['width']) . '; height:' . esc_attr($atts['height']) . ';"></iframe>';
        
        case 'gltf':
            return '<div class="gltf-viewer" data-model-url="' . esc_url($atts['src']) . '" style="width:' . esc_attr($atts['width']) . '; height:' . esc_attr($atts['height']) . ';"></div>';

        default:
            return '<p>Error: Unsupported type "' . esc_html($atts['type']) . '". Supported types are "gltf", "spline", and "sketchfab".</p>';
    }
}
add_shortcode('multiviewer', 'multi_viewer_shortcode');
?>