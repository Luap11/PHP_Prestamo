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
            LlenarCampos()
        )
        function LlenarCampos(){
            $.ajax({
                url : "Services/SDistrito.php",
                data : {
                    txtbus:localStorage.getItem('toEdit'),
                    tipo:'lista'
                },
                type : 'Get',
                dataType : '',
                success: function(resp){
                    let tabla = ''
                    console.log(resp);
                    resp.forEach(element=>{
                        $('#nom').val(element.nom);
                    })  
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        function Editar() {
            $.ajax({
                url : "Services/SDistrito.php",
                data : {
                    cod : localStorage.getItem('toEdit'),
                    nom : $('#nom').val(),
                    tipo:'update'},
                type : 'Get',
                dataType : '',
                success: function(resp){
                    alert('Registro editado')
                    getUrl('Views/VDistrito/VDistritoList.php','')
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
    </script>
</head>

<body>
    <h2 class="content-row-title">Editar Cliente</h2>
    <form class="form">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <label for="nom">Nombre del Distrito</label>
                <input class="form-control w-75" type="text" name="nom" id="nom" required>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-success btn-block mt-3"  onclick="Editar()">Editar</button>
            </div>
        </div>
    </form>

</body>

</html>