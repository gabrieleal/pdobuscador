
        $(document).ready(function () {

            $("#enviar").click(function () {

                var nom = $("#nombre").val();

                $.ajax({
                    type: "GET",
                    url: "controller/consulta.php",
                    data: { nom }
                }).done(function (r) {
                    r = JSON.parse(r);
                    if(r.length == 0){
                        $("#resptable").html(
                            "<tr><td style='color:red' colspan=´3´> NINGUN ELEMENTO COINCIDE CON SU BUSQUEDA</td></tr>"
                        );
                    }
                    i = 0;
                    while (i < r.length) {
                       
                        $("#resptable").append(
                            "<tr><td>" + r[i].id + "</td><td>" + r[i].nombre + "</td><td>" + r[i].stock + "</td></tr>"
                        );
                        i++;
                    }
                });


            });



        });


