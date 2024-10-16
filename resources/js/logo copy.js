import * as THREE from 'three'
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls'
import { STLLoader } from 'three/examples/jsm/loaders/STLLoader'
import Stats from 'three/examples/jsm/libs/stats.module'
import {Text} from 'troika-three-text'


const scene = new THREE.Scene()
scene.add(new THREE.AxesHelper(5))

const light = new THREE.SpotLight()
light.position.set(20, 20, 20)
scene.add(light)

const camera = new THREE.PerspectiveCamera(
    66,
    1,
    0.5,
    1000
)
camera.position.set(66, -66, 66);

var obj;

const renderer = new THREE.WebGLRenderer( { alpha: true } )
// renderer.setSize(window.innerWidth, window.innerHeight)
renderer.setSize(400, 400)
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
    'storage/models/wne.stl',
    function (geometry) {
        const mesh = new THREE.Mesh(geometry, material)
        obj = mesh;
        scene.add(mesh)
        
    },
    (xhr) => {
        console.log((xhr.loaded / xhr.total) * 100 + '% loaded')
    },
    (error) => {
        console.log(error)
    }
)

window.addEventListener('resize', onWindowResize, false)
function onWindowResize() {
    camera.aspect = 1
    camera.updateProjectionMatrix()
    // renderer.setSize("100%", "100%")
    renderer.setSize('400', '400')
    render()
}



const stats = new Stats()
// document.body.appendChild(stats.dom)

function animate() {
    requestAnimationFrame(animate)

    obj.rotation.y += 0.01
    // obj.rotation.x += 0.01

    render()
}

function render() {
    renderer.render(scene, camera)
}

animate()