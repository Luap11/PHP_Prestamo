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
                url : "Services/SEmpleado.php",
                data : {txtbus:'', tipo:'lista'},
                type : 'Get',
                dataType : '',
                success: function(resp){
                    let tabla = ''
                    console.log(resp);
                    resp.forEach(element => {
                        tabla+="<tr>";
                        tabla+="<td>"+element.id+"</td>";
                        tabla+="<td>"+element.nom+"</td>";
                        tabla+="<td>"+element.ape+"</td>";
                        tabla+="<td>"+element.cargo+"</td>";
                        tabla+="<td>"+element.sueldo+"</td>";
                        tabla+="<td><button type='button' class='btn btn-danger' onclick='EliminarEmpleado("+element.id+")'>Eliminar</button></td>";
                        tabla+="<td><button type='button' class='btn btn-info' onclick='EditarEmpleado("+element.id+")'>Editar</button></td>";
                        tabla+="<tr>";
                    });
                    $('#MyTable').html(tabla)
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        function EliminarEmpleado(id) {
            $.ajax({
                url : "Services/SEmpleado.php",
                data : {
                    tipo:'delete',
                    id: id
                },
                type : 'Get',
                dataType : '',
                success: function(resp){
                    let tabla = ''
                    console.log(resp);
                    alert("Registro Eliminado")
                    getUrl('Views/VEmpleado/VEmpleadoList.php','')
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        function EditarEmpleado(cod) {
            localStorage.setItem('toEdit',cod)
            getUrl('Views/VEmpleado/VEmpleadoUpdate.php','')

        }
    </script>
</head>

<body>
    <h2 class="content-row-title">Listado de Empleados</h2>
    <div class="table-responsive ">
    <table class="table table-condensed ">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cargo</th>
            <th>Sueldo</th>
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