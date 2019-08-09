
<!-- Nav tabs -->
<ul class="nav nav-tabs md-tabs nav-justified blue lighten-5 mb-4" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panelMisCV" role="tab">
            <i class="fas fa-file-invoice pr-2"></i>Mis CV</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelCrear" role="tab">
            <i class="fas fa-plus-circle pr-2"></i>Crear CV</a>
    </li>
</ul>
<!-- Nav tabs -->

<!-- Tab panels -->
<div class="tab-content">

    <!-- Panel 1 -->
    <div class="tab-pane fade in show active" id="panelMisCV" role="tabpanel">
        <!-- Nav tabs -->
        <div class="col-sm container-fluid border-primary rounded">
            <div id="divListar"><?php require_once 'listar.php'; ?></div>
        </div>
    </div>
    <!-- Panel 1 -->

    <!-- Panel 2 -->
    <div class="tab-pane fade" id="panelCrear" role="tabpanel">
        <div class="container-fluid border-primary rounded">
            <div id="divCrear"><?php require_once 'alta.php'; ?></div>
        </div>
    </div>
    <!-- Panel 2 -->
</div>


<script type="text/javascript">

$(document).ready(function(){
    $("#files").change(function() {
        if(files!=null){
            if(this.files[0] != null){
                filename = this.files[0].name;
                console.log(filename);  
                $("#formSubirCV").submit();          
            }
        }
    });

   $("#seleccionarCV").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            url: HOST + "curriculums/seleccionar",
            data: {
                cv: id
            },
            type: "post",
            dataType: "json",
            success: function(resp) {
                if (resp.estado) {
                    alert("CV seleccionado!");
                }
            }
        });
    });

});
</script>


