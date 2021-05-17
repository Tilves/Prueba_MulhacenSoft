<!DOCTYPE html>
<html lang="es">
<head>
  <title>API Mulhacensoft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo $this->config->item("base_url"); ?>/assets/img/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo $this->config->item("base_url"); ?>assets/css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>

<body>


  <nav class="navbar navbar-default">
    <div class="container-fluid">
          <div class="row">
            <div class="col-md-1 pt-5 col-sm-6 col-xs-6">
              <select class="form-control" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
                  <option value="spanish" <?php if($this->session->userdata('site_lang') == 'spanish') echo 'selected="selected"'; ?>><?= $this->lang->line('lang_es'); ?></option>
                  <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>><?= $this->lang->line('lang_en'); ?></option> 
              </select>
            </div>
            <?php if($this->session->is_logued_in == TRUE){ ?>
              <div class="col-md-11 col-sm-6 col-xs-6"  style="text-align: right;">
                <h4 class="var-name"><?= $this->session->nombre; ?>
                <a href="<?php echo $this->config->item("base_url"); ?>user/logout" style="margin-left: 10px;">
                  <i class="fa fa-sign-out" style="font-size:20px"></i>
                </a>
                </h4>
              </div>
            <?php } ?>
          </div>
    </div>
  </nav>


<!-- Bloque para notificaciones (Success o Errors) -->
<div class="container pt-15">
    <div class="row">
        <div class="col-sm-12 col-md-12 success-block">
                    <h4><?php echo $this->session->flashdata('success'); ?></h4>
        </div>
        <div class="col-sm-12 col-md-12 error-block">
                <h4><?php echo $this->session->flashdata('error'); ?></h4>
        </div>
    </div>
</div>

