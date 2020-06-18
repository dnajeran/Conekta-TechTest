<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>CONEKTA&copy; Technical Test</title>
    <style>
        #cuadroResultados{
            background-color: #000000;
            width:100%;
            height:250px;
        }
        #textoResultados{
            color:#ffffff;
        }
        #txtComand{
            background-color: #000000;
            color:#ffffff;
            font-weight: bold;
            font-family: 'Helvetica';
        }
    </style>
    <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
              crossorigin="anonymous">
    </script>
  </head>

  <body>
    <script language="javascript" type="text/javascript">
        function EnviarComando() {
            var comando = document.getElementById('txtComand').value;
            var ultcom = document.getElementById('UCom').value;
            var tblres = document.getElementById('tablaRes').value;
            if(!comando || comando.length === 0 || /^\s*$/.test(comando)){
                alert('Por favor, escriba un comando para poder operar');
            } else {
                $.ajax({
                type: 'POST',
                url: 'procesar.php',
                dataType: "json",
                data:({"comando": comando, "ultimoComando" : ultcom , "tabla" : tblres}),
                success: function (data) {
                    if(data == 'X'){
                        window.location.replace("index.php");
                    } else if(comando === 'S'){
                        $("#textoResultados").html(data);
                        $("#tablaRes").val(data);
                    } else {
                        alert(data);
                        $("#tablaRes").val(data);
                    }
                }
                });
                return false;
            }
            
        }
    </script>

    <h1>CONEKTA&copy; Technical Test</h1>
    <br>
    <form name="miform" id="miform" action="" method="post">
        <label>Comandos:</label>
        <input type="text" name="txtComand" id="txtComand" value="" maxlength="17"></input>
        <input type="button" name="btnEnviar" id="btnEnviar" value="Enviar" onclick="EnviarComando()">
        <input type="hidden" name="UCom" id="UCom" value="">
        <input type="hidden" name="tablaRes" id="tablaRes" value="">
    </form>  
    <div id="cuadroResultados">
        <p id="textoResultados">_</p>
    </div>
  </body>
  
</html>