<?php include('layout/header.php'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">Shop</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" id="addbtn" href="javascript:;">
                    <i class="material-icons">store</i>
                    <p class="d-lg-none d-md-block">Shop</p>
                </a>
            </li>
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
                <h4 class="card-title">Shop Added</h4>
                <?php if($this->session->flashdata('picFail')): ?>
                    <div class="alert alert-warning">
                    <strong>Warning!</strong> <?= $this->session->flashdata('picFail')?>
                    </div>
                <?php endif; ?>
                <p class="card-category">Create New Shop</p>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('create-shopkeeper')?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Name</label>
                        <input type="text" name="shname" id="shname" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Phone</label>
                        <input type="text" name="shphone" id="shphone" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Pin Code</label>
                        <input type="text" name="shpincode" id="shpincode" class="form-control">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">District</label>
                        <input type="text" name="shlocation" id="shlocation" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Keeper Password</label>
                        <input type="text" name="skpass" id="skpass" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="">
                        <label class="bmd-label-floating">Shop Image</label>
                        <input type="file" name="shpic" id="shpic" class="form-control">
                        <input type="hidden" name="oldshpic" id="oldshpic">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Address</label>
                        <input type="text" name="shaddress" id="shaddress" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="null" disabled selected>Choose One---</option>
                            <?php for($i = 0;$i < count($cat);$i++): ?>
                                <option value="<?= $cat[$i]['id']?>"><?= $cat[$i]['cat_name']?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Description</label>
                        <input type="text" name="skdes" id="skdes" class="form-control">
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right"><span id="btnname">Create</span> Shop</button>
                <input type="hidden" name="id" id="fid">
                <div class="clearfix"></div>
                </form>
            </div>
            </div>
        </div>
        <div class="col-md-3 showpic">
            <div class="card">
            <img height="200px" height="auto" id="shoppic" alt="">
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
                <h4 class="card-title ">Shop</h4>
                <p class="card-category"> All Shop's listing here.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>#SL NO.</th>
                        <th>Picture</th>
                        <th>Shop Name</th>
                        <th>Phone No.</th>
                        <th>District</th>
                        <th>Address</th>
                        <th>Zip/ Pin Code</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Shop Password</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                        for($i = 0;$i < count($sk);$i++):
                    ?>
                    <tr>
                        <td><?= $count++?></td>
                        <td><img src="<?= base_url($sk[$i]['shpic'])?>" alt="" height="50px" width="auto"></td>
                        <td><?= $sk[$i]['shname']?></td>
                        <td><?= $sk[$i]['shphone']?></td>
                        <td><?= $sk[$i]['shlocation']?></td>
                        <td><?= $sk[$i]['shaddress']?></td>
                        <td><?= $sk[$i]['shpincode']?></td>
                        <td><?= $sk[$i]['cat_name']?></td>
                        <td><?= $sk[$i]['skphone']?></td>
                        <td><?= $sk[$i]['skpass']?></td>
                        <td>
                            <a href="#!" onclick="editme(<?= $sk[$i]['id']?>)"><i class="fa fa-edit"></i></a> | 
                            <a href="<?= base_url('delete-shopkeeper?id='.$sk[$i]['id'])?>"><i class="fa fa-trash"></i></a>
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
    $('#sk').addClass('active');
    $('#form').hide();
  });
  //addbtn
  $('#addbtn').on('click', function(){
    $('#tbl').hide();
    $('#form').show();
    $('.showpic').each(function(){
        $(this).hide();
    });
    $(this).attr('onclick', 'bckbtn()');
    $('#btnname').html("Create");
    $('#shname').val('');
    $('#shphone').val('');
    $('#shpincode').val('');
    $('#shlocation').val('');
    $('#category').val('');
    $('#shaddress').val('');
    $('#skphone').val('');
    $('#skdes').val('');
    $('#skuserid').val('');
    $('#skpass').val('');
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
    $.get('edit-shopkeeper?id='+id, function(data){
      $('#tbl').hide();
      $('#form').show();
      $('.showpic').each(function(){
        $(this).show();
      });
      $('#shname').val(data.shname);
      $('#shname').focus();
      $('#shphone').val(data.shphone);
      $('#shpincode').val(data.shpincode);
      $('#shlocation').val(data.shlocation);
      $('#category').val(data.category);
      $('#shaddress').val(data.shaddress);
      $('#skdes').val(data.skphone);
      $('#skuserid').val(data.skuserid);
      $('#skpass').val(data.skpass);
      $('#fid').val(data.id);
      $('#shoppic').attr('src', '<?= base_url()?>'+data.shpic);
      $('#oldshpic').val(data.shpic);
      $('#btnname').html("Update");
    });
  }
</script>
<?php include('layout/footer.php'); ?>     