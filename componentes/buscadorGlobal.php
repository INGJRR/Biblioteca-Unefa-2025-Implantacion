
<style>
    .form{
        max-width: 500px;
        width: 100%;
        margin-right: auto;
        filter: drop-shadow(4px 4px 4px rgba(0, 0, 0, 0.187));
    }
    .form-input{
        display: flex;
        align-items: center;
        height: 45px;
    }
    .form-input input{
        flex-grow: 1;
        padding: 0 16px;
        height: 100%;
       border: none;
       filter: drop-shadow(4px 4px 4px  rgba(0, 0, 0, 0.187));
        background: var(--greyy);
        border-radius: 36px 0 0 36px;
        outline: none;
        width: 100%;
        color: var(--dark);
        font-size: 22px;
    }
    .form-input button{
        background-image: url('../imagenes/buscar.png');
        width: 39px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: var(--blue);
        color: var(--light);
        font-size: 18px;
        border: none;
        outline: none;
        border-radius: 0 36px 36px 0;
        cursor: pointer;
        background-repeat: no-repeat;
        filter: drop-shadow(4px 4px 4px  rgba(0, 0, 0, 0.187));
        background-size: 20px;
        background-position: center;
    }



</style>

<!-- Estructura del html -->
<form action="<?= $url ?>" style="margin: 0 auto;" method="get">
    <div class="form-input" style="margin: 20px 0;">
        <input id="busqueda" type="search" placeholder="Buscar" name="buscar">
        <button type="submit" style="background-image: url(imagenes/buscar\ \(1\).png);" class="search-btn"><i class='bx bx-search'></i></button>
    </div>
</form>