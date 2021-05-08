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
            listarDist(),
        )
        function Insertar() {
            $.ajax({
                url : "Services/SCliente.php",
                data : {
                    nom : $('#nom').val(),
                    ape : $('#ape').val(),
                    dni : $('#dni').val(),
                    codDist : $('#dist').val(),
                    tipo:'insert'},
                type : 'Get',
                dataType : '',
                success: function(resp){
                    alert('insertado')
                    getUrl('Views/VCliente/VClienteList.php','')
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        function listarDist(){
            $.ajax({
                url : "Services/SDistrito.php",
                data : {
                    tipo:'lista',
                    txtbus : ''
                    },
                type : 'Get',
                dataType : '',
                success: function(resp){
                    let options = ''
                    console.log(resp);
                    resp.forEach(element => {
                        options+="<option value="+element.cod+">"+element.nom+"</option>";
                    });
                    $('#dist').html(options)
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
    </script>
</head>

<body>
    <h2 class="content-row-title">Insertar Cliente</h2>
    <form class="form">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <label for="nom">Nombre</label>
                <input class="form-control w-75" type="text" name="nom" id="nom" required>
            </div>
            <div class="col-xs-12 col-sm-6">
                <label for="ape">Apellido</label>
                <input class="form-control w-75" type="text" name="ape" id="ape" required>
            </div>
            <div class="col-xs-12 col-sm-6">
                <label for="dni">DNI</label>
                <input class="form-control w-75" type="text" name="dni" id="dni" required>
            </div>
            <div class="col-xs-12 col-sm-6">
                <label for="dist" >Distrito</label>
                <select class="form-control w-75" name="dist" id="dist">
                    
                </select>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-success btn-block mt-3"  onclick="Insertar()">Insertar</button>
            </div>
        </div>
    </form>

</body>

</html>