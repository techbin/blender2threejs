<html>
	<head>
		<title>My first three.js app</title>
		<style>
			body { margin: 0; }
			canvas { width: 100%; height: 100% }
		</style>
	</head>
	<body>
		<script src="js/three.js"></script>
		<script>
			var scene = new THREE.Scene();
			var camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 1000 );

			var renderer = new THREE.WebGLRenderer();
			renderer.setSize( window.innerWidth, window.innerHeight );
			document.body.appendChild( renderer.domElement );



//			var geometry = new THREE.BoxGeometry( 2, 2, 2 );
//			var material = new THREE.MeshNormalMaterial();//MeshBasicMaterial( { color: 0x00fff0 } );
//			var cube = new THREE.Mesh( geometry, material );
//			scene.add( cube );

			camera.position.z = 5;

			var animate = function () {
				requestAnimationFrame( animate );

//				cube.rotation.x += 0.1;
				//cube.rotation.y += 0.1;
	
			renderer.render(scene, camera);
			rotate();
			
			};




function rotate() {
				var timer = Date.now() * 0.0005;
				camera.position.x = Math.cos( timer ) * 8;
				camera.position.y = 1;
				camera.position.z = Math.sin( timer ) * 8;
				camera.lookAt( scene.position );
				renderer.render( scene, camera );
			}


animate();























// instantiate a loader
var loader = new THREE.JSONLoader();
loader.load('models/newbox.json', function(geometry) {
	material = new THREE.MeshBasicMaterial( {  side: THREE.BackSide , wireframe: false } );//color: 0x00ff00,
  


    mesh = new THREE.Mesh(geometry,material);
    //mesh.material.color.setHex( 0xff0000 );
    mesh.scale.x = mesh.scale.y = mesh.scale.z = 0.75;
    mesh.translation = geometry.center(geometry);
//here is the funcion defined and attached to the  object
mesh.setColor = function(color){
     mesh.material.color = new THREE.Color(color);
}
//mesh.setColor(0xFFFFFF);  //change color using hex value or
mesh.setColor("blue") ;   //set material color by using color name
scene.add(mesh);
//edges                             =   new THREE.EdgesHelper(mesh, 0xff0000);
//edges.material.linewidth          =   1;
//scene.add(edges);
});


		</script>
	</body>
</html>