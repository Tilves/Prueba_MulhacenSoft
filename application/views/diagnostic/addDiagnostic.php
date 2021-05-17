<div class="container pt-15">

    <form class="well form-horizontal" action="<?php echo $this->config->item("base_url")."diagnostic/insert" ?>" method="post"  id="">
    <fieldset>
    <legend><center><h2><b><?= $this->lang->line('diagnostic_insert'); ?></b></h2></center></legend><br>

    <div class="form-group">
    <label class="col-md-4"></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-book"></i></span>
    <input name="descripcion" placeholder="<?= $this->lang->line('description_diagnostic'); ?>" class="form-control"  type="text" required>
    </div>
    </div>
    </div>

    <div class="form-group" style="text-align: center;">
    <label class="col-md-4"></label>
    <div class="col-md-4"><br>
    <a href="<?php echo $this->config->item("base_url"); ?>patient" class="btn btn-warning"><?= $this->lang->line('back'); ?></span></a>
    <input name="id_paciente" type="hidden" value="<?= $idPatient; ?>">
    <button type="submit" class="btn btn-primary" ><?= $this->lang->line('save'); ?></span></button>
    </div>
    </div>

    </fieldset>
    </form>
    </div>
</div>