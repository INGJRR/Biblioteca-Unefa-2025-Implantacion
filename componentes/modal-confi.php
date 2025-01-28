  <!-- ESTILOS DEL MODAL -->
  <style>
      .boton {
          background-color: rgb(82, 152, 202);
          border: 0;
          border-radius: 5px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
          color: #fff;
          font-size: 14px;
          padding: 10px 25px;
      }

      .modal-container {
          display: flex;
          align-items: center;
          justify-content: center;
          position: absolute;
          pointer-events: none;
          background-color: #eeee;
          height: 100%;
          width: 100%;
          opacity: 0;
          top: 0;
          left: 0;
          transition: opacity 0.3s ease;

      }

      .show {
          pointer-events: auto;
          opacity: 1;
      }

      .modal {

          padding: 50px 40px;
          border-radius: 5px;
          text-align: center;
          overflow: hidden;
          position: relative;
          background-color: #ffffff;
          text-align: left;
          border-radius: 0.5rem;
          height: 400px;
          width: 500px;
          box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
          margin: auto;

      }

      .modal h1 {
          margin: 0;
      }

      .modal p {
          opacity: 0.7;
          font-size: 14px;
      }

      .image {
          display: flex;
          margin-left: auto;
          margin-right: auto;
          background-color: rgb(249, 203, 203);
          flex-shrink: 0;
          justify-content: center;
          align-items: center;
          width: 4rem;
          height: 4rem;
          border-radius: 9999px;
      }

      .image svg {
          color: #dc2626;
          width: 2rem;
          height: 2rem;
      }

      .content {
          margin-top: 1rem;
          text-align: center;
      }

      .title {
          color: #111827;
          font-size: 1.5rem;
          font-weight: 600;
          margin-left: 20%;
          line-height: 1.5rem;
      }

      .message {
          margin-top: 0.5rem;
          color: #6b7280;
          font-size: 0.90rem;
          line-height: 1.25rem;
      }

      .actions {
          margin: 0.75rem 1rem;
          background-color: #f9fafb;
      }

      .desactivate {
          display: inline-flex;
          padding: 0.5rem 1rem;
          background-color: #dc2626;
          color: #ffffff;
          font-size: 1rem;
          line-height: 1.5rem;
          font-weight: 500;
          justify-content: center;
          width: 100%;
          border-radius: 0.375rem;
          border-width: 1px;
          border-color: transparent;
          box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      }

      .cancel {
          display: inline-flex;
          margin-top: 0.75rem;
          padding: 0.5rem 1rem;
          background-color: #ffffff;
          color: #374151;
          font-size: 1rem;
          line-height: 1.5rem;
          font-weight: 500;
          justify-content: center;
          width: 100%;
          border-radius: 0.375rem;
          border: 1px solid #d1d5db;
          box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      }
  </style>

  <!-- ESTILOS DEL MODAL -->
  <div id="modal_container" class="card modal-container">
      <div class="modal">
          <div class="image"><br><br><br><br>
              <svg
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  aria-hidden="true">
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"></path>

              </svg>
          </div>
          <!--  MODAL -->
          <div class="content">
              <span class="title"><?= $md_confi_titulo ?></span>
              <p class="message">
                <?php echo ($md_confi_mensaje != '') ? $md_confi_mensaje : ''?>
              </p>
          </div>
          <div class="actions">
              <button type="button" class="desactivate boton" id="confirmar" >Confirmar</button>
              <button type="button" id="close" class="cancel boton">Atras</button>
          </div>
      </div>
  </div>
  <!--  MODAL -->

  <!-- FUNCION DEL MODAL -->
  <script>
    //   const open = document.getElementById('open');
    const modal_container = document.getElementById('modal_container');
    const close = document.getElementById('close');
    const botones = document.getElementsByClassName('open-button');
    const confirmar = document.getElementById('confirmar');
    let ref = '';



    for (let i = 0; i < botones.length; i++) {
        botones[i].addEventListener('click', function(e) {
            event.preventDefault(); // Evita que se siga el enlace por defecto
            modal_container.classList.add('show');  
            ref = this.href;
            // ...
        });
    }  

    confirmar.addEventListener('click', () => {
        window.location.href = ref;
    });   

    close.addEventListener('click', () => {
        modal_container.classList.remove('show');
    });


  </script>
  <!-- FUNCION DEL MODAL -->
