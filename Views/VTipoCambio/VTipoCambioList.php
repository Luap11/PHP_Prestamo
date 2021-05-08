<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(
            Listar()
        )
        function Listar() {
            $.ajax({
                url : "Services/STipo_Cambio.php",
                data : {txtbus:'', tipo:'lista'},
                type : 'Get',
                dataType : '',
                success: function(resp){
                    let tabla = ''
                    console.log(resp);
                    resp.forEach(element => {
                        tabla+="<tr>";
                        tabla+="<td>"+element.cod+"</td>";
                        tabla+="<td>"+element.nom+"</td>";
                        tabla+="<td>"+element.monto+"</td>";
                        tabla+="<td><button type='button' class='btn btn-danger' onclick='EliminarTipo("+element.cod+")'>Eliminar</button></td>";
                        tabla+="<td><button type='button' class='btn btn-info' onclick='EditarTipo("+element.cod+")'>Editar</button></td>";
                        tabla+="<tr>";
                    });
                    $('#MyTable').html(tabla)
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        function EliminarTipo(cod) {
            $.ajax({
                url : "Services/STipo_Cambio.php",
                data : {
                    tipo:'delete',
                    cod: cod
                },
                type : 'Get',
                dataType : '',
                success: function(resp){
                    let tabla = ''
                    console.log(resp);
                    alert("Registro Eliminado")
                    getUrl('Views/VTipoCambio/VTipoCambioList.php','')
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        function EditarTipo(cod) {
            localStorage.setItem('toEdit',cod)
            getUrl('Views/VTipoCambio/VTipoCambioUpdate.php','')

        }
    </script>
</head>

<body>
    <h2 class="content-row-title">Listado de Tipos de cambio</h2>
    <div class="table-responsive ">
    <table class="table table-condensed ">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Monto</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody id="MyTable">

    </tbody>
    </table>
    </div>

</body>

</html>