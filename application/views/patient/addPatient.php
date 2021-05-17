<div class="container pt-15">

    <?php if(isset($data)){
        $title = $this->lang->line('edit'); ;
        $action = $this->config->item("base_url")."patient/edit/".$data[0]['id'];
    }else{
        $title = $this->lang->line('create'); ;
        $action = $this->config->item("base_url")."patient/insert";
    }
    ?>

    <form class="well form-horizontal" action="<?= $action; ?>" method="post"  id="">
    <fieldset>
    <legend><center><h2><b><?= $title; ?> <?= $this->lang->line('patient'); ?></b></h2></center></legend><br>

    <div class="form-group">
    <label class="col-md-4"></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input name="nombre" placeholder="<?= $this->lang->line('full_name'); ?>" value="<?php if(isset($data)){echo $data[0]['nombre'];}?>" class="form-control"  type="text" required>
    </div>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4"></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
    <input name="dni" placeholder="DNI (00000000A)" value="<?php if(isset($data)){echo $data[0]['dni'];}?>" class="form-control"  type="text" required>
    </div>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4"></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
    <input name="direccion" placeholder="<?= $this->lang->line('address'); ?>" value="<?php if(isset($data)){echo $data[0]['direccion'];}?>" class="form-control" type="text" required>
    </div>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4"></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    <input name="email" placeholder="E-Mail" value="<?php if(isset($data)){echo $data[0]['email'];}?>" class="form-control"  type="email" required>
    </div>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-4"></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
    <input name="fecha_nacimiento" value="<?php if(isset($data)){echo $data[0]['fecha_nacimiento'];}?>" class="form-control" type="date" required>
    </div>
    </div>
    </div>

    <div class="form-group" style="text-align: center;">
    <label class="col-md-4"></label>
    <div class="col-md-4"><br>
    <a href="<?php echo $this->config->item("base_url"); ?>patient" class="btn btn-warning"><?= $this->lang->line('back'); ?></span></a>
    <button type="submit" class="btn btn-primary" ><?= $title; ?></span></button>
    </div>
    </div>
    
    </fieldset>
    </form>
    </div>
</div>