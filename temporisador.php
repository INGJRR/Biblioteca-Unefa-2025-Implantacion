    <style>
        
        .tp-timer-conten{
            position: absolute;
            top: 0;
            right: 0;
            z-index: 5000;
            background-color: red;
            margin: 10px;
            border-radius: 40px;
            padding: 10px;
        }
 
        .tp-titulo{
            text-align: center;
            font-weight: bolder;
            font-size: 40px;
            letter-spacing: 5px;
        }

        .tp-info{
            font-size: 30px;
            font-weight: bolder;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            margin: 15px;
        }

        .tp-timer {
            font-size: 100px;
            text-align: center;
            padding: 10px;
            font-weight: bolder;
        }

        @media (max-width: 580px) {
            .tp-timer {
                font-size: 50px;
            }

        }
    </style>


    <div class="tp-timer-conten">
        <div>
            <h1 class="tp-titulo">Temporizador</h1>
            <div id="timer" class="tp-timer">00:00:00.000</div>
            <!-- <button id="start">Iniciar</button>
            <button id="stop">Detener</button>
            <button id="reset">Reiniciar</button> -->
        </div>
        <div class="tp-info">
            <p>Creditos: <a href="https://el-rincon-de-lo-insolito.web.app/aboutme" target="_blank" >Ing Jesús Ríos</a></p>
            <p style="margin: 20px; letter-spacing: 5px;;" ><a href="./estadisticas_temporizador.php" target="_blank">Estadisticas</a></p>
            <div id="tp-historial" class="tp-historial">
                
            </div>
        </div>
    </div>

    <!-- <script src="./script//temporisador.js"></script> -->