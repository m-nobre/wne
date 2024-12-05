import * as THREE from 'three'
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls'
import { STLLoader } from 'three/examples/jsm/loaders/STLLoader'
import Stats from 'three/examples/jsm/libs/stats.module'


const scene = new THREE.Scene()
// scene.add(new THREE.AxesHelper(5))

const light = new THREE.SpotLight()
light.position.set(20, 20, 20)
scene.add(light)

const camera = new THREE.PerspectiveCamera(
    66,
    1,
    0.5,
    1000
)
camera.position.set(130, 0, 166);

var obj;

const renderer = new THREE.WebGLRenderer( { alpha: true } )

// If height bigger than width, as in mobile, set side width for both else sets side of heigh for both, like desktop
if(window.innerHeight > window.innerWidth){
    renderer.setSize(window.innerWidth, window.innerWidth)
} else {

    renderer.setSize(window.innerHeight, window.innerHeight)
}

document.getElementById("logo-3d-container").appendChild(renderer.domElement)

const controls = new OrbitControls(camera, renderer.domElement)
controls.enableDamping = true

const envTexture = new THREE.CubeTextureLoader().load([
    'storage/models/textures/g1.png',
    'storage/models/textures/g2.png',
    'storage/models/textures/g3.png',
    'storage/models/textures/g4.png',
    'storage/models/textures/g5.png',
    'storage/models/textures/g6.png',
])
envTexture.mapping = THREE.CubeReflectionMapping

const material = new THREE.MeshPhysicalMaterial({
    color: 0xffdc73,
    envMap: envTexture,
    metalness: 1,
    roughness: 0.1,
    opacity: 1.0,
    transparent: false,
    transmission: 0.99,
    clearcoat: 1.0,
    clearcoatRoughness: 0.25,
    reflectivity: 1,
    iridescence: 1,
    specularIntensity: 1,
})

const loader = new STLLoader()

loader.load(
    'storage/models/wne-3px.stl',
    function (geometry) {
        const mesh = new THREE.Mesh(geometry, material)
        obj = mesh;
        // SETTING POSITION OF THE MESH OBJECT WITH x,y,z props
        mesh.position.x = 0;
        mesh.position.y = 0;
        mesh.position.z = 0;
        scene.add(mesh)
        
    },
    (xhr) => {
        console.log((xhr.loaded / xhr.total) * 100 + '% loaded')
    },
    (error) => {
        console.log(error)
    }
)

// instantiate a loader
const imgLoader = new THREE.ImageLoader();

// load a image resource
imgLoader.load(
	// resource URL
	'storage/images/wneround.png',

	// onLoad callback
	function ( image ) {

		scene.drawImage( image, 100, 100 );
	},

	// onProgress callback currently not supported
	undefined,

	// onError callback
	function () {
		console.error( 'An error happened.' );
	}
);

window.addEventListener('resize', onWindowResize, false)
function onWindowResize() {
    camera.aspect = 1
    camera.updateProjectionMatrix()
    if(window.innerHeight > window.innerWidth){
        renderer.setSize(window.innerWidth, window.innerWidth)
    } else {
    
        renderer.setSize(window.innerHeight, window.innerHeight)
    }
    render()
}



const stats = new Stats()
// document.body.appendChild(stats.dom)

function animate() {
    requestAnimationFrame(animate)

    if (obj != null){
        obj.rotation.y += 0.01
    }
    // obj.rotation.x += 0.01

    render()
}

function render() {
    renderer.render(scene, camera)
}

animate()