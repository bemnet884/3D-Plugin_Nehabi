Here is the updated `README.md` for the 3D Multi-Viewer Plugin, with your name and the context of the plugin being for the Nehabin website builder based on WordPress:

```markdown
# 3D Multi-Viewer Plugin for Nehabin Website Builder

## Description

The 3D Multi-Viewer Plugin allows you to embed and display 3D models on your WordPress website, specifically designed for the **Nehabin Website Builder**. This plugin supports multiple 3D model types, including Spline, Sketchfab, and GLTF/GLB models. It allows users to view interactive 3D models directly within posts and pages using a simple shortcode.

### Features:
- Supports embedding **GLTF**, **Sketchfab**, and **Spline** models.
- Easily customizable via shortcode with adjustable dimensions.
- Supports **3D model uploads** via the WordPress admin panel (GLTF/GLB).
- Provides a shortcode to insert 3D models in posts, pages, and custom content.
- Fully compatible with the Nehabin Website Builder.

---

## Installation

1. Download the plugin ZIP file.
2. In your WordPress dashboard, go to **Plugins > Add New**.
3. Click on **Upload Plugin** and select the ZIP file.
4. Activate the plugin after installation.
5. After activation, the plugin will add a new menu under the **Admin Dashboard** titled **3D Multi-Viewer** where you can upload your models and get the corresponding shortcode.

---

## Usage

### Shortcode:
To use the 3D viewer in your posts or pages, add the following shortcode:

```plaintext
[multiviewer type="gltf" src="MODEL_URL" width="100%" height="500px"]
```

**Parameters:**
- `type` (required): Specify the model type. Options: `gltf`, `spline`, `sketchfab`.
- `src` (required): The URL of the 3D model or the embed iframe (e.g., Spline, Sketchfab).
- `width` (optional): Width of the viewer. Default: `100%`.
- `height` (optional): Height of the viewer. Default: `500px`.

Example for a GLTF model:
```plaintext
[multiviewer type="gltf" src="https://example.com/model.gltf" width="100%" height="500px"]
```

Example for an embedded Spline model:
```plaintext
[multiviewer type="spline" src="https://example.com/spline-embed" width="100%" height="500px"]
```

---

## Admin Panel - Upload Models

You can upload your 3D models directly from the WordPress admin panel.

1. Go to **3D Multi-Viewer** from the **Admin Dashboard**.
2. Under the **Upload a New 3D Model** section, click **Choose File** and upload your `.gltf` or `.glb` file.
3. After uploading, the model will appear in the **Uploaded Models** table, with the corresponding shortcode you can use to embed the model on your website.
4. Copy the shortcode and paste it into any post or page.

---

## Supported 3D Model Types

- **GLTF/GLB**: These are the most widely supported 3D model formats, and the plugin provides a viewer for these models.
- **Sketchfab**: Easily embed models from Sketchfab using an iframe.
- **Spline**: Embed Spline models by adding their iframe URL.

---

## Customization

You can style the 3D viewer by modifying the included `style.css`. The default viewer has a responsive design, but you can customize it further to fit your site's needs.

---

## Troubleshooting

- **Model not displaying**: Ensure that the URL of the model is correct, and that the model is publicly accessible.
- **Upload issues**: Only `.gltf` and `.glb` files are allowed. If you encounter errors, make sure the file type matches the allowed MIME types.
- **Missing model in ZIP**: If you've uploaded a ZIP file with GLTF/GLB models, ensure that the ZIP file contains a `.gltf` or `.glb` file.

---

## Changelog

### Version 1.1
- Initial release with support for embedding Spline, Sketchfab, and GLTF/GLB models.
- Added model upload functionality in the admin panel.
- Enhanced error handling for missing models and file types.

---

## Author

**Bemnet Beyene**

- [Website](https://www.nehabin.com)
- [Contact](mailto:your-email@example.com)

---

## License

This plugin is licensed under the [GPL-2.0 License](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
```

### Key Updates:
- Your name is now **Bemnet Beyene**.
- The plugin is for the **Nehabin Website Builder**, which is based on WordPress.
- Instructions on how to upload and use the plugin are added, along with troubleshooting tips.
