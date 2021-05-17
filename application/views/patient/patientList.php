<div class="container pb-35">
    <div class="row">
        <a href="<?php echo $this->config->item("base_url"); ?>patient/viewInsert" class="btn btn-primary"><i class="fa fa-user" style="font-size: 18px;"></i>  <?= $this->lang->line('create_patient'); ?></a>
    </div>
</div>

<div class="container pb-35">
    <div class="row">
        <table id="patient_list" class="display table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th><?= $this->lang->line('identifier'); ?></th>
                    <th><?= $this->lang->line('full_name'); ?></th>
                    <th>DNI</th>
                    <th><?= $this->lang->line('see_detail'); ?></th>
                    <th><?= $this->lang->line('edit'); ?></th>
                    <th><?= $this->lang->line('delete'); ?></th>
                    <th><?= $this->lang->line('diagnostic_insert'); ?></th>
                    <th><?= $this->lang->line('list_diagnostic'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient) { ?> 
                    <tr>
                        <td><?= $patient['id']; ?></td>
                        <td><?= $patient['nombre']; ?></td>
                        <td><?= $patient['dni']; ?></td>
                        <td><a href="<?php echo $this->config->item("base_url"); ?>patient/details/<?= $patient['dni']; ?>" class="btn btn-primary"><?= $this->lang->line('see_detail'); ?></a></td>
                        <td><a href="<?php echo $this->config->item("base_url"); ?>patient/viewEdit/<?= $patient['id']; ?>" class="btn btn-warning"><?= $this->lang->line('edit'); ?></a></td>
                        <td><a href="<?php echo $this->config->item("base_url"); ?>patient/deletePatient/<?= $patient['dni']; ?>" onclick="return confirm('<?= $this->lang->line('confirm_delete'); ?>')" class="btn btn-danger"><?= $this->lang->line('delete'); ?></a></td>
                        <td><a href="<?php echo $this->config->item("base_url"); ?>diagnostic/viewInsert/<?= $patient['id']; ?>" class="btn btn-primary"><?= $this->lang->line('diagnostic_insert'); ?></a></td>
                        <td><a href="<?php echo $this->config->item("base_url"); ?>diagnostic/listDiagnostic/<?= $patient['id']; ?>" class="btn btn-primary"><?= $this->lang->line('list_diagnostic'); ?></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#patient_list').DataTable({
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