<!-- Frame Modal Top Info-->
<div class="modal fade top" id="modalMensajeSistema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content" style="background-color: turquoise;">
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <!-- <p class="pt-3 pr-2 black-text">Mensaje del sistema:</p> -->
                    <p class="pt-2 pr-2 black-text" style="font-size:25px;"><?= $_SESSION['mensajes'] ?></p>
                    <!-- <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cerrar</a> -->
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Frame Modal Bottom Success-->

<script>
    $(document).ready(function () {
        $("#modalMensajeSistema").modal('show');

        function limpiarSesion() {
            $.ajax(HOST+'/paginas/limpiarSesion',{
                type: 'GET',
                cache: true
            });

            $("#modalMensajeSistema").modal('hide');
        }

        setTimeout(() => {
            limpiarSesion();
        }, 1500);
    });
</script>