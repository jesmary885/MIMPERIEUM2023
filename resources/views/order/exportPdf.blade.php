<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido de productos</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px
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
            font-size: 10px;
        }

        #encabezado {
            text-align: left;
            margin-left: 35%;
            margin-right: 35%;
            font-size: 15px;
        }

        #fact{
            float: right;
            text-align: center;
            margin-top: 2%;
            margin-left: 2px;
            margin-right: 2px;
            font-size: 20px;
            background: #3f6212;
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
            background: #3f6212;
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
            background: #3f6212;
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
            background: #3f6212;
            text-align: center;
            border-bottom: 1px solid #ffffff;
        }

        #facproducto tfoot th,td{
            margin-bottom: 0px;
            margin-top: 0px;
       
        }

        img{
            margin-left: 0px;
            margin-bottom: 0px;
            width: 115px;
        }

        #fp {
            margin: 0;
      
                 
        }


    </style>
</head>
<body>
    <header>
        <div>

            <img src="storage/img/MIPERIUM.png" alt="logo">
        </div>
        <div>
            <table id="datos">
                <thead>
                    <tr>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p>RUC: 20610374281<br>
                            AV GRAU MZ H9 LT 8 COMITE 39 V.M.T. <br>
                                Teléfono: 998287436<br>
                                Email: soportemimperium@gmail.com<br>
                                CUENTA BANCARIA BBVA: 0011-0323-0100040391<br>
                                Nombre : MIMPERIUM EIRL<br><br><br>
                                Fecha de compra: {{$fecha}} <br>
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            <p>ORDEN NRO.</p>
            <p>{{$nro_orden}}</p>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>Cliente</th>
                        <th>Código</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$cliente}}</td>
                        <td>{{$cliente_code}}</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>Cantidad</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                        <tr>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->name}}</td>
                            <td>S/ {{$item->price}}</td>
                            <td>S/ {{($item->qty)*($item->price)}}</td>
                        </tr>
                    @endforeach
                </tbody>
    
                <tfoot>
                    
               
                    
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL A PAGAR: </p>
                        </th>
                        <td>
                            <p align="center">S/ {{$total}}</p>
                        </td> 

                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer id="fo">

    </footer>

    
</body>
</html>