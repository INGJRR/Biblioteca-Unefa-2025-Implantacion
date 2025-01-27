<!DOCTYPE html>
<html>
<head>
  <title>Modal Sencillo</title>
  <style>
    /* Estilos CSS */
    .modal {
      display: none; /* Oculto por defecto */
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
	  cursor:pointer;
    }
	
  </style>
</head>
<body>

  <button id="myBtn">Abrir Modal</button>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>¡Hola! Este es un modal sencillo.</p>
    </div>
  </div>

  <script>
    // Obtener elementos
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    // Cuando se hace clic en el botón, se muestra el modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // Cuando se hace clic en <span> (x), se cierra el modal
    span.onclick = function() {
      modal.style.display = "none";
    }
  </script>

</body>
</html>