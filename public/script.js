// script.js
document.addEventListener("DOMContentLoaded", function () {
    const videoContainer = document.getElementById("video-container");
    const video = document.getElementById("video");
    const cargarFoto = document.getElementById("cargarFoto");
    const eliminarFoto = document.getElementById("eliminarFoto");
    const imageInput = document.getElementById("imageInput");
  
    // Cargar foto
    cargarFoto.addEventListener("click", function () {
      imageInput.click(); // Activa el input file
    });
  
    // Manejar la selección de imagen
    imageInput.addEventListener("change", function () {
      const file = imageInput.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function () {
          const fotoBase64 = reader.result;
          // Verificar si hay un rostro en la imagen y guardarla
          faceapi
            .detectSingleFace(fotoBase64)
            .withFaceLandmarks()
            .then((detections) => {
              if (detections) {
                // Guardar la foto si se detecta un rostro
                savePhoto(fotoBase64);
                alert("Rostro detectado. La foto se ha guardado.");
              } else {
                alert("No se detectó un rostro en la foto.");
              }
            })
            .catch((error) => {
              console.error(error);
            });
        };
        reader.readAsDataURL(file);
      }
    });
  
    // Eliminar foto
    eliminarFoto.addEventListener("click", function () {
      // Agrega la lógica para eliminar la foto almacenada
      // Puedes utilizar una solicitud al servidor para borrar la foto
    });
  
    // Resto del código...
  });
  