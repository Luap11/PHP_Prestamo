<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url : "http://localhost/PHP-Prestamo/Services/SCliente.php?txtbus=1",
                data : {txtbus:'', tipo:'lista'},
                type : 'Get',
                dataType : '',
                success: function(resp){
                    let tabla = ''
                    console.log(resp);
                    //var JCli = JSON.parse(resp);
                    //console.log(JCli);
                    //alert(resp);
                    resp.forEach(element => {
                        //console.log(element)
                        tabla+="<tr>";
                        tabla+="<td>"+element.cod+"</td>";
                        tabla+="<td>"+element.nom+"</td>";
                        tabla+="<td>"+element.ape+"</td>";
                        tabla+="<td>"+element.dni+"</td>";
                        tabla+="<tr>";
                    });
                    $('#MyTable').html(tabla)
                },
                error: function(mens){
                    console.log(mens);
                    //alert('Error 404: '+mens)

                }
            });

            var settings = {
                "url": "http://localhost/PHP-Prestamo/Services/SCliente.php?txtbus=1",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },
            };

            $.ajax(settings).done(function(response) {
                console.log(response)
                //console.log(response);
            });
        })
    </script>
</head>

<body>
    <h1>Bienvenidos</h1>
    <div>
    <table border="1">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
        </tr>
    </thead>
    <tbody id="MyTable">

    </tbody>
    </table>
    </div>

</body>

</html>