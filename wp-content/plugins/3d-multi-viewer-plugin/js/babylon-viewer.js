document.addEventListener("DOMContentLoaded", () => {
    const viewers = document.querySelectorAll('.gltf-viewer');

    viewers.forEach((viewer) => {
        const modelUrl = viewer.getAttribute('data-model-url');
        if (!modelUrl) {
            console.error("No model URL found.");
            viewer.innerHTML = '<p>Error: Model URL is missing.</p>';
            return;
        }

        // Create Babylon.js engine
        const canvas = document.createElement('canvas');
        canvas.style.width = "100%";
        canvas.style.height = "100%";
        viewer.appendChild(canvas);

        const engine = new BABYLON.Engine(canvas, true);
        const scene = new BABYLON.Scene(engine);

        // Add camera
        const camera = new BABYLON.ArcRotateCamera("camera", Math.PI / 2, Math.PI / 2.5, 10, BABYLON.Vector3.Zero(), scene);
        camera.attachControl(canvas, true);

        // Add lights
        const light1 = new BABYLON.HemisphericLight("light1", new BABYLON.Vector3(0, 1, 0), scene);
        const light2 = new BABYLON.DirectionalLight("light2", new BABYLON.Vector3(1, -1, 0), scene);

        // Load GLTF model
        BABYLON.SceneLoader.Append("", modelUrl, scene, () => {
            console.log("Model loaded successfully.");

            // Center the camera on the model
            scene.createDefaultCameraOrLight(true, true, true);
        }, null, (scene, message, exception) => {
            console.error("Error loading GLTF:", message, exception);
            viewer.innerHTML = '<p>Error: Failed to load the model.</p>';
        });

        // Render loop
        engine.runRenderLoop(() => {
            scene.render();
        });

        // Adjust canvas size on window resize
        window.addEventListener("resize", () => {
            engine.resize();
        });
    });
});
