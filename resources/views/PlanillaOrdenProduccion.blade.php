<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de produccion</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        #datos{
            text-align: left;
            float: left;
            margin-top: 0%;
            margin-left: 0%;
            margin-right: 0%;
           
        }

        #datos p{
            text-align: left;

           
        }

        #fo{
            text-align: center;
            font-size: 8px;
            color: gray;
        }



        #fact{
            float: right;
            text-align: center;
            margin-top: 2%;
            margin-left: 2px;
            margin-right: 2px;
            font-size: 20px;
            background: #33afff;
            border-radius: 8px;
            font-weight: bold;
        }

        #fact p{
         
            margin-left: 5px;
            margin-right: 5px;
          
        }

        #cliente{
            text-align: left;
        }

        section{
            clear: left;
        }

        #fact,
        #fv,
        #fa {
            color: #ffffff;
            font-size: 15px;            
        }

        #faproveedor {
            width: 40%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }


        #faproveedor thead{
            padding: 20px;
            background: #33afff;
            text-align: left;
            border-bottom: 1px solid #ffffff;

        }

        #faccomprador {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #faccomprador thead{
            padding: 20px;
            background: #33afff;
            text-align: center;
            border-bottom: 1px solid #ffffff;

        }

        #facproducto {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            text-align: center;
            border: 1px solid #000;
            margin-bottom: 15px;
        }

        #facproducto thead{
            padding: 20px;
            background: #33afff;
            text-align: center;
            border-bottom: 1px solid #ffffff;
        }

        img{
            margin-left: 0%;
            margin-right: 0%;
            margin-bottom: 0%;
            margin-top: 0%;
            width: 50%;
            height: 5%;
            opacity: 0.4;
        }

        #encabezado{
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
            border-radius: 15px;
        }
        #encabezado td{
            width: 25%;
            text-align: center;
            vertical-align: center;
            border: 1px solid #000;
            border-collapse: collapse;
            color: gray;
            font-size: 12px;
        }
        #encabezado th{
            width: 25%;
            text-align: center;
            vertical-align: center;
            border: 1px solid #000;
            border-collapse: collapse;
            color: gray;
            font-weight: normal;
            font-size: 12px;
        }

        #cuerpo{
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
            border-radius: 15px;
        }
        #cuerpo th{
            width: 25%;
            padding-left: 4px;
            text-align: left;
            vertical-align: center;
            border: 1px solid #000;
            border-collapse: collapse;
            color: #000;
            font-weight: normal;
            font-size: 12px;
        }

        #cuerpo td{
            width: 25%;
            padding-left: 4px;
            text-align: left;
            vertical-align: center;
            border: 1px solid #000;
            border-collapse: collapse;
            color: #000;
            font-size: 12px;
        }


        #ref{
            text-align: right;
            color: gray;

        }
        h3{
            color: gray;
            text-align: center;
        }

        #operaciones{
            table-layout: fixed;
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
            border-radius: 15px;
            text-align: center;
            font-size: 10px;
        }
        #operaciones th,td{
            width: 25%;
            padding-left: 4px;
            text-align: center;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            color: #000;
            font-size: 10px;
        }

        #op{
            width: 5%;
        }
        #fase {
            font-size: 8px;
        }
        #fec {
            font-size: 12px;
        }


    </style>
</head>
<body>
    <header> 
        <div>
            <table id="encabezado">
                <thead>
                    <tr>
                      <th><img src="img/tiet.jpg" alt="logo"></th>
                      <th><p>MANUAL DE PROCEDIMIENTOS <br> TRABAJO DEL SGC</p> </th>
                      <th><p>CÓDIGO: <br> REG-RAN-01 </p></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><p>FECHA DE EMISIÓN:<br> {{$fecha}}</p> </td>
                        <td><p>ORDEN DE PRODUCCIÓN<br> (SECCIÓN RANURADO)</p> </td>
                        <td><p>REVISIÓN Nº<br> {{$id}}</p> </td>
                    </tr>
                </tbody>
            </table>
        </div>
       
        <section>
            <div id="ref">
                <p>DOC. REF.. ITR-RAN-01</p>
            </div>
        </section>
       
    </header>
       <section>
        <table id="cuerpo">
            <thead>
                <tr>
                  <th><p>ORDEN Nº {{$id}}</p></th>
                  <th><p>CANTIDAD: {{$cantidad}}</p> </th>
                  <th><p>FECHA: {{$fecha}} </p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p>TIPO: {{$tipo_ranurado}}</p> </td>
                    <td><p>DIÁMETRO: {{$diametro}}</p> </td>
                    <td><p>ROSCA: {{$rosca}}</p> </td>
                </tr>
            </tbody>
        </table>

        <table id="cuerpo">
            <thead>
                <tr>
                  <th><p>LBS/FT: {{$lbs}}</p></th>
                  <th><p>GRADO: {{$grado}}</p> </th>
                  <th><p>MAQ: {{$maq}} </p></th>
                  <th><p>EXT./LIBRES: {{$ext}} </p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p>RANURA: {{$ranura}}</p> </td>
                    <td><p>%AA: {{$aa}}</p> </td>
                    <td><p>DENSIDAD RPP: {{$densidad}}</p> </td>
                    <td><p>LONG/INT.: {{$long}}</p> </td>
                </tr>
                <tr>
                    <td colspan="2"><p>CLIENTE: {{$cliente}}</p> </td>
                    <td colspan="2"><p>SUPLIDOR: {{$suplidor}}</p> </td>
                </tr>
                <tr>
                    <td colspan="2"><p>FECHA DE RECEPCIÓN: {{$fecha}}</p> </td>
                    <td colspan="2"><p>CONSECUTIVO: </p> </td>
                </tr>
            </tbody>
        </table>

    </section>

    <section>
        <h3>OPERACIONES</h3>
        <table id="operaciones">
            <thead>
                  <th><p>FASE / DESCRIPCIÓN</p> </th>
                  <th><p>FECHA INICIO </p></th>
                  <th><p>FECHA CULMINACIÓN </p></th>
                  <th><p>VERIFICACIÓN FIRMA </p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p id="fase">1 - TROQUELAR E IDENTIFICACIÓN DEL TUBO<br>DOC. DE REFERENCIA: ITR-RAN-02</p> </td>
                    <td><p id="fec"></p> </td>
                    <td><p id="fec"></p> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td><p id="fase"> 2 - RANURA SEGÚN ORDEN<br>DOC. DE REFERENCIA: ITR-RAN-03</p> </td>
                    <td><p id="fec"></p> </td>
                    <td><p id="fec"></p> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td><p id="fase">3 - LIMPIAR Y ELIMINAR REBARBAS<br>DOC. DE REFERENCIA: ITR-RAN-05</p> </td>
                    <td><p id="fec"></p> </td>
                    <td><p id="fec"></p> </td>
                    <td> </td>
                </tr>

                <tr>
                    <td><p id="fase">4 - PROTEGER TUBERIA EN ZONA RANURADA<br>DOC. DE REFERENCIA: ITR-RAN-05</p> </td>
                    <td><p id="fec"></p> </td>
                    <td><p id="fec"></p> </td>
                    <td> </td>
                </tr>

                <tr>
                    <td><p id="fase">5 - ALMACENADO EN RACK N°<br>DOC.REFERENCIA:PRO-LOG-17/ITR-RAN-05</p> </td>
                    <td><p id="fec"></p> </td>
                    <td><p id="fec"></p> </td>
                    <td> </td>
                </tr>
    
            </tbody>
        </table>

    </section>


   
    <section>
        <h4>OBSERVACIONES: {{$observaciones}}</h4>
    </section>
    <br>
    <br>


    <section>
        <table id="cuerpo">
            <thead>
                <tr>
                  <th><p>ELABORADO POR:</p></th>
                  <th><p>REVISADO POR:</p> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p>{{$usuario}}</p> </td>
                    <td></p> </td>
                </tr>
              
            </tbody>
        </table>

    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

 

    <footer id="fo">

        <p>
            PROPIEDAD DE T.I.E.T. QUEDA  PROHIBIDA SU REPRODUCCIÓN PARCIAL O TOTAL. SIN PERMISO PREVIO DE SU PROPIETARIO
        </p>
    </footer>

    
</body>
</html>