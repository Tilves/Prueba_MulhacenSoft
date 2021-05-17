<div class="container pb-35">
    <div class="row">

    <legend><center><h2><b><?= $this->lang->line('list_diagnostic'); ?></b></h2></center></legend><br>

        <table id="diagnostic_list" class="display table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th><?= $this->lang->line('identifier'); ?></th>
                    <th><?= $this->lang->line('diagnostic'); ?></th>
                    <th><?= $this->lang->line('date_diagnostic'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diagnostics as $diagnostic) { ?> 
                    <tr>
                        <td><?= $diagnostic['id']; ?></td>
                        <td><?= $diagnostic['descripcion']; ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($diagnostic['fecha_diagnostico'])); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container pb-35">
    <div class="row">
        <a href="<?php echo $this->config->item("base_url"); ?>patient" class="btn btn-warning"><?= $this->lang->line('back'); ?></span></a>
    </div>
</div>


<script>
    $(document).ready(function() {
        var table = $('#diagnostic_list').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
    } );
</script>