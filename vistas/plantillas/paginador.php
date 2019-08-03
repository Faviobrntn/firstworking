<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">
            Página <?= $paginacion['actual'] ?> de <?= $paginacion['paginas'] ?>
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous <?= (!$paginacion['anterior'])? 'disabled':'' ?>" id="dtBasicExample_previous">
                    <a href="?page=<?= $paginacion['anterior'] ?>" aria-controls="dtBasicExample" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>

                <!--<li class="paginate_button page-item active">
                    <a href="#" aria-controls="dtBasicExample" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="dtBasicExample" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                </li>-->

                <li class="paginate_button page-item next <?= (!$paginacion['siguiente'])? 'disabled':'' ?>" id="dtBasicExample_next">
                    <a href="?page=<?= $paginacion['siguiente'] ?>" aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>