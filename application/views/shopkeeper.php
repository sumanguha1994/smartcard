<?php include('layout/header.php'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">Shop Keeper</a>
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
                    <p class="d-lg-none d-md-block">Shop Keeper</p>
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
                <h4 class="card-title">Shop Keeper Added</h4>
                <p class="card-category">Create New Shop Keeper</p>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('create-shopkeeper')?>">
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
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Location</label>
                        <input type="text" name="shlocation" id="shlocation" class="form-control">
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
                        <label class="bmd-label-floating">Shop Address</label>
                        <input type="text" name="shaddress" id="shaddress" class="form-control">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Keeper Phone Number</label>
                        <input type="text" name="skphone" id="skphone" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Keeper Userid</label>
                        <input type="text" name="skuserid" id="skuserid" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Shop Keeper Password</label>
                        <input type="text" name="skpass" id="skpass" class="form-control">
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right"><span id="btnname">Create</span> Shop Keeper</button>
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
                <h4 class="card-title ">Shop Keeper Table</h4>
                <p class="card-category"> All Shop Keeper's listing here.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>#SL NO.</th>
                        <th>Category</th>
                        <th>Shop Name</th>
                        <th>Shop Phone</th>
                        <th>Shop Pin Code</th>
                        <th>Shop Location</th>
                        <th>Shop Address</th>
                        <th>Shop Keeper Phone Number</th>
                        <th>Shop Keeper Userid</th>
                        <th>Shop Keeper Password</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                        for($i = 0;$i < count($sk);$i++):
                    ?>
                    <tr>
                        <td><?= $count++?></td>
                        <td><?= $sk[$i]['cat_name']?></td>
                        <td><?= $sk[$i]['shname']?></td>
                        <td><?= $sk[$i]['shphone']?></td>
                        <td><?= $sk[$i]['shpincode']?></td>
                        <td><?= $sk[$i]['shlocation']?></td>
                        <td><?= $sk[$i]['shaddress']?></td>
                        <td><?= $sk[$i]['skphone']?></td>
                        <td><?= $sk[$i]['skuserid']?></td>
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
    $(this).attr('onclick', 'bckbtn()');
    $('#btnname').html("Create");
    $('#shname').val('');
    $('#shphone').val('');
    $('#shpincode').val('');
    $('#shlocation').val('');
    $('#category').val('');
    $('#shaddress').val('');
    $('#skphone').val('');
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
      $('#shname').val(data.shname);
      $('#shname').focus();
      $('#shphone').val(data.shphone);
      $('#shpincode').val(data.shpincode);
      $('#shlocation').val(data.shlocation);
      $('#category').val(data.category);
      $('#shaddress').val(data.shaddress);
      $('#skphone').val(data.skphone);
      $('#skuserid').val(data.skuserid);
      $('#skpass').val(data.skpass);
      $('#fid').val(data.id);
      $('#btnname').html("Update");
    });
  }
</script>
<?php include('layout/footer.php'); ?>     