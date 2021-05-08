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
                url : "Services/SDistrito.php",
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
                        tabla+="<td><button type='button' class='btn btn-danger' onclick='EliminarDistrito("+element.cod+")'>Eliminar</button></td>";
                        tabla+="<td><button type='button' class='btn btn-info' onclick='EditarDistrito("+element.cod+")'>Editar</button></td>";
                        tabla+="</tr>";
                    });
                    $('#MyTable').html(tabla)
                    console.log(tabla)
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        function EliminarDistrito(cod) {
            $.ajax({
                url : "Services/SDistrito.php",
                data : {
                    tipo:'delete',
                    cod: cod
                },
                type : 'Get',
                dataType : '',
                success: function(resp){
                    let tabla = ''
                    console.log(resp);
                    if(resp.success == true){
                        alert("Registro Eliminado")
                        getUrl('Views/VDistrito/VDistritoList.php','')
                    }else if(resp.success == false){
                        alert("Error al eliminar registro, este registro esta relacionado con otras tablas ")
                    }
                    
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        function EditarDistrito(cod) {
            localStorage.setItem('toEdit',cod)
            getUrl('Views/VDistrito/VDistritoUpdate.php','')

        }
    </script>
</head>

<body>
    <h2 class="content-row-title">Listado de Distritos</h2>
    <div class="table-responsive ">
    <table class="table table-condensed ">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre del distrito</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody id="MyTable">

    </tbody>
    </table>
    </div>

</body>

</html>