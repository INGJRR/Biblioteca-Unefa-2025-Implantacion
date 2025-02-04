  <!-- ESTILOS DEL MODAL -->
  <style>
      .md_error_modal-container {
          display: flex;
          align-items: center;
          justify-content: center;
          position: absolute;
          background-color: #eeee;
          height: 100%;
          width: 100%;
          top: 0;
          left: 0;
          z-index: 5;
      }

      .md_error_modal {
          padding: 50px 40px;
          border-radius: 5px;
          text-align: center;
          overflow: hidden;
          position: relative;
          background-color: #ffffff;
          text-align: left;
          border-radius: 0.5rem;
          width: 500px;
          box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
          margin: auto;
      }

      .md_error_modal h1 {
          margin: 0;
      }

      .md_error_modal .image {
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

      .md_error_modal .image svg {
          color: #dc2626;
          width: 2rem;
          height: 2rem;
      }

      .md_error_modal .content {
          margin-top: 1rem;
          text-align: center;
      }

      .md_error_modal .title {
          color: #111827;
          font-size: 1.5rem;
          font-weight: 600;
          line-height: 1.5rem;
          margin: 0;
          text-align: center;
          display: block;
      }

      .md_error_modal .message {
          margin-top: 0.5rem;
          color: #6b7280;
          font-size: 0.90rem;
          line-height: 1.25rem;
      }

      .md_error_modal .actions {
          margin: 0.75rem 1rem;
          background-color: #f9fafb;
      }

      .md_error_modal .cancel {
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
          cursor: pointer;
      }

  </style>

  <!-- ESTILOS DEL MODAL -->
  <div id="md_error_modal_container" class="md_error_modal-container">
      <div class="md_error_modal">
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
              <span class="title"><?= $md_error_titulo ?></span>
              <p class="message">
                <?php echo ($md_error_mensaje != '') ? $md_error_mensaje : ''?>
              </p>
          </div>
          <div class="actions">            
              <button type="button" id="md_error_close" class="cancel boton">Cerrar modal</button>
          </div>
      </div>
  </div>
  <!--  MODAL -->









  <!-- FUNCION DEL MODAL -->
  <script>
    const md_error_modal_container = document.getElementById('md_error_modal_container');
    const md_error_close = document.getElementById('md_error_close');

    md_error_close.addEventListener('click', () => {
        md_error_modal_container.style.display = 'none';
    });


  </script>
  <!-- FUNCION DEL MODAL -->
