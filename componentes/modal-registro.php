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
        border-radius: 0.5rem;
        height: 400px;
        width: 500px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        margin: auto;
      
    }


    .image {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        background-color: rgb(125, 153, 238);
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
        line-height: 1.5rem;
        margin-left: 35%;

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
        background-color: rgb(125, 153, 238);
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
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
        </div>
        <!--  MODAL -->
        <div class="content"><br>
           <center><span class="title">    Registrar</span></center> <br>
            <p class="message">
                ¿Seuro que desea arear este reistro?              
            </p>
        </div>
        <div class="actions">
            <button type="button" id="enviarModal" class="desactivate boton">Enviar datos</button>
            <button type="button" id="close" class="cancel boton">Cancelar</button>
        </div>
    </div>
</div>
<!--  MODAL -->



<!-- FUNCION DEL MODAL -->
<script>
    const open = document.getElementById('open');
    const modal_container = document.getElementById('modal_container');
    const close = document.getElementById('close');
    const enviarModal = document.getElementById('enviarModal');
    const enviar = document.getElementById('enviar');

    open.addEventListener('click', () => {
        modal_container.classList.add('show');
    });

    enviarModal.addEventListener('click', () => {
        enviar.click();
        modal_container.classList.remove('show');
    });

    close.addEventListener('click', () => {
        modal_container.classList.remove('show');
    });
</script>
<!-- FUNCION DEL MODAL -->