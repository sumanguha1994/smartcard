<?php include('layout/header.php'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">Franchise</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
        <?php if($this->session->userdata('loginrole') != 'franchise'):?>
            <li class="nav-item">
                <a class="nav-link" id="addbtn" href="javascript:;">
                    <i class="material-icons">facebook</i>
                    <p class="d-lg-none d-md-block">Franchise</p>
                </a>
            </li>
        <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="content" id="form">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Franchise Added</h4>
                <p class="card-category">Create New Franchise</p>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('create-franchise')?>">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Location</label>
                        <input type="text" name="location" id="location" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right"><span id="btnname">Create</span> Franchise</button>
                <input type="hidden" name="id" id="fid">
                <div class="clearfix"></div>
                </form>
            </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="content" id="tbl">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Franchise Table</h4>
                <p class="card-category"> All franchise's listing here.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>#SL NO.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                        for($i = 0;$i < count($fran);$i++):
                    ?>
                    <tr>
                        <td><?= $count++?></td>
                        <td><?= $fran[$i]['name']?></td>
                        <td><?= $fran[$i]['phone']?></td>
                        <td><?= $fran[$i]['location']?></td>
                        <td><?= $fran[$i]['email']?></td>
                        <td>
                            <a href="#!" onclick="editme(<?= $fran[$i]['id']?>)"><i class="fa fa-edit"></i></a> | 
                            <a href="<?= base_url('delete-franchise?id='.$fran[$i]['id'])?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function(){
    $('#member').addClass('active');
    $('#form').hide();
  });
  //addbtn
  $('#addbtn').on('click', function(){
    $('#tbl').hide();
    $('#form').show();
    $(this).attr('onclick', 'bckbtn()');
    $('#btnname').html("Create");
    $('#name').val('');
    $('#email').val('');
    $('#location').val('');
    $('#phone').val('');
    $('#password').val('');
    $('#fid').val('');
  });
  //bckbtn
  function bckbtn()
  {
    $('#tbl').show();
    $('#form').hide();
    $('#addbtn').removeAttr('onclick');
  }
  //edit 
  function editme(id)
  {
    $.get('edit-franchise?id='+id, function(data){
      $('#tbl').hide();
      $('#form').show();
      $('#name').val(data.name);
      $('#name').focus();
      $('#email').val(data.email);
      $('#location').val(data.location);
      $('#phone').val(data.phone);
      $('#fid').val(data.id);
      $('#password').val(data.password);
      $('#btnname').html("Update");
    });
  }
</script>
<?php include('layout/footer.php'); ?>     