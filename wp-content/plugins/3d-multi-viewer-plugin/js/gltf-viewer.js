document.addEventListener("DOMContentLoaded", () => {
    const viewers = document.querySelectorAll(".gltf-viewer");

    viewers.forEach((viewer) => {
        const modelUrl = viewer.getAttribute("data-model-url");
        if (!modelUrl) {
            console.error("No model URL found.");
            viewer.innerHTML = "<p>Error: Model URL is missing.</p>";
            return;
        }

        // Create a Three.js scene
        const scene = new THREE.Scene();

        // Create a camera
        const camera = new THREE.PerspectiveCamera(
            75, 
            viewer.clientWidth / viewer.clientHeight, 
            0.1, 
            1000
        );
        camera.position.set(0, 1.5, 5);

        // Create a renderer
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(viewer.clientWidth, viewer.clientHeight);
        viewer.appendChild(renderer.domElement);

        // Add a light
        const light = new THREE.HemisphereLight(0xffffff, 0x444444, 1);
        light.position.set(0, 20, 0);
        scene.add(light);

        // Load the GLTF model
        const loader = new THREE.GLTFLoader();
        loader.load(
            modelUrl,
            (gltf) => {
                scene.add(gltf.scene);
                animate(); // Start rendering the scene
            },
            undefined,
            (error) => {
                console.error("An error occurred while loading the GLTF model:", error);
                viewer.innerHTML = "<p>Error: Failed to load the GLTF model.</p>";
            }
        );

        // Render loop
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }

        // Resize the renderer on window resize
        window.addEventListener("resize", () => {
            renderer.setSize(viewer.clientWidth, viewer.clientHeight);
            camera.aspect = viewer.clientWidth / viewer.clientHeight;
            camera.updateProjectionMatrix();
        });
    });
});
