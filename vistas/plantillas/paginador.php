<?php if (empty($this->paginador)): ?>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="dtBasicExample_previous">
                    <a href="#" aria-controls="dtBasicExample" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a>
                </li>
                <li class="paginate_button page-item next disabled" id="dtBasicExample_next">
                    <a href="#" aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">Siguiente</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php else: ?>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">
            Página <?= $this->paginador['actual'] ?> de <?= $this->paginador['paginas'] ?>
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous <?= (!$this->paginador['anterior'])? 'disabled':'' ?>" id="dtBasicExample_previous">
                    <a href="?page=<?= $this->paginador['anterior'] ?>" aria-controls="dtBasicExample" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a>
                </li>

                <!--<li class="paginate_button page-item active">
                    <a href="#" aria-controls="dtBasicExample" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="dtBasicExample" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                </li>-->

                <li class="paginate_button page-item next <?= (!$this->paginador['siguiente'])? 'disabled':'' ?>" id="dtBasicExample_next">
                    <a href="?page=<?= $this->paginador['siguiente'] ?>" aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">Siguiente</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php endif ?>