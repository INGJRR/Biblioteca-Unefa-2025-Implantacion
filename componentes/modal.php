<style>
    * {
  box-sizing: border-box;
}

body {
  background-color: #edeef6;
  font-family: 'Poppins', sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  margin: 0;
}
button {
  background-color: #47a386;
  border: 0;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  color: #fff;
  font-size: 14px;
  padding: 10px 25px;
}

.modal-container {
  display: flex;
  background-color: rgba(0, 0, 0, 0.3);
  align-items: center;
  justify-content: center;
  position: fixed;
  pointer-events: none;
  opacity: 0;  
  top: 0;
  left: 0;
  height: 100vh;
  width: 100vw;
  transition: opacity 0.3s ease;
}

.show {
  pointer-events: auto;
  opacity: 1;
}

.modal {
  background-color: #fff;
  width: 600px;
  max-width: 100%;
  padding: 30px 50px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  text-align: center;
}

.modal h1 {
  margin: 0;
}

.modal p {
  opacity: 0.7;
  font-size: 14px;
}
</style>



<button id="open">
  Hacer Click
</button>

<div id="modal_container" class="modal-container">
  <div class="modal">
    <h1>Ventana Modal</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque assumenda dignissimos illo explicabo natus quia repellat, praesentium voluptatibus harum ipsam dolorem cumque labore sunt dicta consectetur, nesciunt maiores delectus maxime?
    </p>
    <button id="close">Cerrar</button>
  </div>
</div>

<script>
    const open = document.getElementById('open');
    const modal_container = document.getElementById('modal_container');
    const close = document.getElementById('close');

    open.addEventListener('click', () => {
    modal_container.classList.add('show');  
    });

    close.addEventListener('click', () => {
    modal_container.classList.remove('show');
    });
</script>
