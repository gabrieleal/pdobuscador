
        $(document).ready(function () {

            $("#enviar").on("click",function (){
                var nom=$("#nombre").val();
                buscar(nom);
            });


        });

        function buscar(nom) {

            $("#listar").empty();

            $.ajax({
                type: "POST",
                url: "controller/consulta.php",
                data: { nom }
            }).done(function (art) {
                art = JSON.parse(art);
                if(art.length == 0){
                    $("#listar").append(
                        '<tr><td style="color:red" colspan="3"> NINGUN ELEMENTO COINCIDE CON SU BUSQUEDA</td></tr>'
                    );
                }
                i = 0;
                while (i < art.length) {
                   
                    $("#listar").append(
                        "<tr><td>" + art[i].id + "</td><td>" + art[i].nombre + "</td><td>" + art[i].stock + "</td></tr>"
                    );
                    i++;
                }
            }).fail(function(){
                console.log("se produjo un error");
            })
        }

