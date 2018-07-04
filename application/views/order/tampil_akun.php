<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Homic | Confirmation</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
    <link href="<?= base_url() ?>assets/css/signin.css" rel="stylesheet">
  </head>
  <body
  <?php if ($data->status == 'b_aktif'){ ?>
        class="text-center"
    <?php }else{ ?>

    <?php } ?>
  >
   
  <?php if ($data->status != 'b_aktif'){ ?>
      <main role="main" class="container" style="margin-bottom: 280px;">
        <h1 class="mt-5">Berhasil Konfirmasi Akun</h1>
        <p class="lead">Akun anda sekarang sudah aktif, <a href="<?= site_url('auth') ?>">login</a></p>
      </main>
    <?php }else{ ?>
       
       <?php echo $this->session->flashdata('message'); ?>

      <form class="form-signin" action="<?= site_url('C_order/send_akun') ?>" method="POST" enctype="multipart/form-data">
        <img class="mb-4" src="<?= base_url() ?>assets/img/Homic Logo web.png" alt="">
        <h1 class="h3 mb-3 font-weight-normal">konfirmasi Akun</h1>
        <input type="text" class="form-control" value="<?= $data->no_seri ?>" readonly>
        <br>
        <input type="hidden" name="id_akun" class="form-control" value="<?= $data->id_akun ?>">
        <input type="hidden" name="no_seri" class="form-control" value="<?= $data->no_seri ?>">
        <input type="text" name="username" class="form-control" placeholder="Username" required value="<?php echo set_value('username'); ?>">
        <br>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <br>
        <input type="password" name="passconf" class="form-control" placeholder="Confrim Password" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
        <p class="mt-5 mb-3 text-muted">Enter data correctly</p>
      </form>
      <?php } ?>

    <footer class="footer">
      <div class="container text-center">
        <span class="text-muted">Homic System</span>
      </div>
    </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>
