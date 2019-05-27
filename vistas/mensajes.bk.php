<!-- <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;"> -->
<!-- <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false"> -->
    <div class="toast" style="position: absolute; top: 0; right: 0; z-index:999999">
        <div class="toast-header">
            <strong class="mr-auto">Mensajes del sistema</strong>
            <!-- <small>11 mins ago</small> -->
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['mensajes'] ?>
        </div>
    </div>
<!-- </div> -->


<script>
    $(document).ready(function () {
        $('.toast').toast({
            animation: true,
            autohide: false,
            delay: 1500
        }).toast('show');


        function limpiarSesion() {
            $.ajax(HOST+'/paginas/limpiarSesion',{
                type: 'GET',
                cache: true
            });
        }

        setTimeout(() => {
            limpiarSesion();
        }, 1500);
    });
</script>