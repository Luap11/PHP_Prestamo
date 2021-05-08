<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        function Insertar() {
            $.ajax({
                url : "Services/STipo_cambio.php",
                data : {
                    nom : $('#nom').val(),
                    monto : $('#monto').val(),
                    tipo : 'insert'},
                type : 'Get',
                dataType : '',
                success: function(resp){
                    alert('insertado')
                    getUrl('Views/VTipoCambio/VTipoCambioList.php','')
                },
                error: function(mens){
                    console.log(mens);
                }
            });
        }
        
    </script>
</head>

<body>
    <h2 class="content-row-title">Insertar nuevo tipo de cambio</h2>
    <form class="form">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <label for="nom">Nombre</label>
                <input class="form-control w-75" type="text" name="nom" id="nom" required>
            </div>
            <div class="col-xs-12 col-sm-6">
                <label for="monto">Monto</label>
                <input class="form-control w-75" type="text" name="monto" id="monto" required>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-success btn-block mt-3"  onclick="Insertar()">Insertar</button>
            </div>
        </div>
    </form>

</body>

</html>