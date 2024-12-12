<?php

function multi_viewer_add_admin_menu() {
    add_menu_page(
        '3D Multi-Viewer', 
        '3D Multi-Viewer', 
        'manage_options', 
        '3d-multi-viewer', 
        'multi_viewer_admin_page', 
        'dashicons-visibility', 
        20
    );
}
add_action('admin_menu', 'multi_viewer_add_admin_menu');

function multi_viewer_admin_page() {
    ?>
<div class="wrap">
  <h1>3D Multi-Viewer Plugin</h1>

  <h2>Upload a New 3D Model</h2>
  <form method="post" enctype="multipart/form-data" style="margin-bottom: 20px;">
    <?php wp_nonce_field('multi_viewer_upload_model', 'multi_viewer_nonce'); ?>
    <input type="file" name="model" accept=".gltf,.glb" required>
    <button type="submit" class="button button-primary">Upload Model</button>
  </form>

  <?php
       // Handle file upload in admin-upload.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['model'])) {
    if (!wp_verify_nonce($_POST['multi_viewer_nonce'], 'multi_viewer_upload_model')) {
        echo '<div class="notice notice-error"><p>Security check failed.</p></div>';
        return;
    }

    $allowed_types = array('model/gltf+json', 'model/gltf-binary'); // MIME types for .gltf and .glb
    $file_type = wp_check_filetype($_FILES['model']['name']);

    if (!in_array($file_type['type'], $allowed_types)) {
        echo '<div class="notice notice-error"><p>Invalid file type. Only .gltf and .glb are allowed.</p></div>';
        return;
    }

    $upload = wp_handle_upload($_FILES['model'], array('test_form' => false));

    if (isset($upload['error'])) {
        echo '<div class="notice notice-error"><p>Error uploading file: ' . esc_html($upload['error']) . '</p></div>';
        return;
    }

    $uploads = get_option('gltf_uploaded_models', array());
    $uploads[] = $upload['url'];
    update_option('gltf_uploaded_models', $uploads);

    echo '<div class="notice notice-success"><p>Model uploaded successfully! Copy the shortcode below:</p>';
    echo '<code>[multiviewer type="gltf" src="' . esc_url($upload['url']) . '" width="100%" height="500px"]</code></div>';
}
?>

  <h2>Uploaded Models</h2>
  <table class="widefat fixed" style="margin-top: 20px;">
    <thead>
      <tr>
        <th>File Name</th>
        <th>Shortcode</th>
        <th>Preview</th>
      </tr>
    </thead>
    <tbody>
      <?php
                $uploads = get_option('gltf_uploaded_models', array());
                if (!empty($uploads)) {
                    foreach ($uploads as $url) {
                        $file_name = basename($url);
                        echo '<tr>';
                        echo '<td>' . esc_html($file_name) . '</td>';
                        echo '<td><code>[multiviewer type="gltf" src="' . esc_url($url) . '" width="100%" height="500px"]</code></td>';
                        echo '<td><a href="' . esc_url($url) . '" target="_blank">View Model</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No models uploaded yet.</td></tr>';
                }
                ?>
    </tbody>
  </table>
</div>
<?php
}