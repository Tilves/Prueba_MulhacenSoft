<div class="container pt-15">

    <div class="well form-horizontal" style="font-size: 18px;">
    <fieldset>
    <legend><h2><b><?= $this->lang->line('patient_detail'); ?></b></h2></legend><br>
    
    <?php foreach ($data as $patient) { ?> 

        <div class="form-group">
        <label class="col-md-4"><?= $this->lang->line('identifier'); ?>: <?= $patient['id'] ?></label>  
        </div>

        <div class="form-group">
        <label class="col-md-4"><?= $this->lang->line('full_name'); ?>: <?= $patient['nombre'] ?></label>  
        </div>

        <div class="form-group">
        <label class="col-md-4">DNI: <?= $patient['dni'] ?></label>  
        </div>

        <div class="form-group">
        <label class="col-md-4"><?= $this->lang->line('date_of_birth'); ?>: <?= date('d-m-Y', strtotime($patient['fecha_nacimiento'])) ?></label>  
        </div>

        <div class="form-group">
        <label class="col-md-4"><?= $this->lang->line('address'); ?>: <?= $patient['direccion'] ?></label>  
        </div>

        <div class="form-group">
        <label class="col-md-4">Email: <?= $patient['email'] ?></label>  
        </div>

        <div class="form-group">
        <label class="col-md-4"><?= $this->lang->line('discharge_date'); ?>: <?= date('d-m-Y', strtotime($patient['fecha_registro'])) ?></label>  
        </div>

        <div class="form-group">
        <div class="col-md-4"><br>
        <a href="<?php echo $this->config->item("base_url"); ?>patient" class="btn btn-warning"><?= $this->lang->line('back'); ?></span></a>
        </div>
        <label class="col-md-4"></label>
        </div>

    <?php } ?>

    </fieldset>
    </div>
    </div>
</div>