<?php

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

    // Handle ZIP files if the type is 'gltf' and the source is a ZIP file
    if ($atts['type'] === 'gltf' && pathinfo($atts['src'], PATHINFO_EXTENSION) === 'zip') {
        $upload_dir = wp_upload_dir();
        $zip_path = $upload_dir['basedir'] . '/' . basename($atts['src']);
        $extract_to = $upload_dir['basedir'] . '/unzipped/' . basename($atts['src'], '.zip');

        // Check if the ZIP has already been extracted
        if (!file_exists($extract_to)) {
            mkdir($extract_to, 0755, true);
            $zip = new ZipArchive();
            if ($zip->open($zip_path) === TRUE) {
                $zip->extractTo($extract_to);
                $zip->close();
            } else {
                return '<p>Error: Unable to extract ZIP file.</p>';
            }
        }

        // Locate the GLTF file in the extracted folder
        $gltf_files = glob("$extract_to/*.gltf");
        if (!empty($gltf_files)) {
            $gltf_url = $upload_dir['baseurl'] . '/unzipped/' . basename($atts['src'], '.zip') . '/' . basename($gltf_files[0]);
            $atts['src'] = $gltf_url;
        } else {
            return '<p>Error: No GLTF file found in the ZIP archive.</p>';
        }
    }

    // Handle each model type (spline, sketchfab, gltf)
    switch ($atts['type']) {
        case 'spline':
            return '<iframe src="' . esc_url($atts['src']) . '" frameborder="0" style="width:' . esc_attr($atts['width']) . '; height:' . esc_attr($atts['height']) . ';"></iframe>';
        
        case 'sketchfab':
            return '<iframe src="' . esc_url($atts['src']) . '" frameborder="0" allow="autoplay; fullscreen" style="width:' . esc_attr($atts['width']) . '; height:' . esc_attr($atts['height']) . ';"></iframe>';
        
        case 'gltf':
            // Return a div with the correct model URL
            return '<div class="gltf-viewer" data-model-url="' . esc_url($atts['src']) . '" style="width:' . esc_attr($atts['width']) . '; height:' . esc_attr($atts['height']) . ';"></div>';

        default:
            return '<p>Error: Unsupported type "' . esc_html($atts['type']) . '". Supported types are "gltf", "spline", and "sketchfab".</p>';
    }
}

add_shortcode('multiviewer', 'multi_viewer_shortcode');