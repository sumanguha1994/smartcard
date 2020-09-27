<?php include('layout/header.php'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">Category</a>
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
                    <i class="material-icons">category</i>
                    <p class="d-lg-none d-md-block">Members</p>
                </a>
            </li>
        </ul>
    </div>
  </div>
</nav>
<a id="addbtnagn" href="#!" style="position: absolute;right: 167px;top: 5%;z-index:99">
    <i class="material-icons">category</i>
</a>
<!-- End Navbar -->
<div class="content" id="form">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Category Added</h4>
                <p class="card-category">Create New Category</p>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('create-category')?>">
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Category</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group">
                        <label class="bmd-label-floating">category Icon</label>
                        <br />
                        <input type="radio" name="cat_icon" id="cat_icon" value="assets/icon/car-service.png" title="Car Service">&nbsp;<img src="<?= base_url('assets/icon/car-service.png')?>" alt="">
                        &nbsp;&nbsp;
                        <input type="radio" name="cat_icon" id="cat_icon" value="assets/icon/dish.png" title="Dish">&nbsp;<img src="<?= base_url('assets/icon/dish.png')?>" alt="">
                        &nbsp;&nbsp;
                        <input type="radio" name="cat_icon" id="cat_icon" value="assets/icon/pet-shop.png" title="Pet Shop">&nbsp;<img src="<?= base_url('assets/icon/pet-shop.png')?>" alt="">
                        &nbsp;&nbsp;
                        <input type="radio" name="cat_icon" id="cat_icon" value="assets/icon/shop (1).png" title="Friut Shop">&nbsp;<img src="<?= base_url('assets/icon/shop (1).png')?>" alt="">
                        &nbsp;&nbsp;
                        <input type="radio" name="cat_icon" id="cat_icon" value="assets/icon/shop (2).png" title="Friut Shop">&nbsp;<img src="<?= base_url('assets/icon/shop (2).png')?>" alt="">
                        &nbsp;&nbsp;
                        <input type="radio" name="cat_icon" id="cat_icon" value="assets/icon/shop (3).png" title="Friut Shop">&nbsp;<img src="<?= base_url('assets/icon/shop (3).png')?>" alt="">
                        &nbsp;&nbsp;
                        <input type="radio" name="cat_icon" id="cat_icon" value="assets/icon/shop.png" title="Shop">&nbsp;<img src="<?= base_url('assets/icon/shop.png')?>" alt="">
                    </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="fid">
                <button type="submit" class="btn btn-primary pull-right"><span id="btnname">Create</span> Category</button>
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
                <h4 class="card-title ">Category Table</h4>
                <p class="card-category"> All Category listing here.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>#SL NO.</th>
                        <th>Category Name</th>
                        <th>Category Icon</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php 
                      $count = 1;
                      for($i = 0;$i < count($cat);$i++):
                    ?>
                    <tr>
                        <td><?= $count++?></td>
                        <td><?= $cat[$i]['cat_name']?></td>
                        <td><img src="<?= base_url($cat[$i]['cat_icon'])?>" alt=""></td>
                        <td>
                          <a href="#!" onclick="editme(<?= $cat[$i]['id']; ?>)"><i class="fa fa-edit"></i></a> | 
                          <a href="<?= base_url('delete-category?id='.$cat[$i]['id'])?>"><i class="fa fa-trash"></i></a>
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
    $('#cat').addClass('active');
    $('#form').hide();
  });
  //addbtn
  $('#addbtn').on('click', function(){
    $('#tbl').hide();
    $('#form').show();
    $(this).attr('onclick', 'bckbtn()');
    $('#cat_name').val('');
    $('#fid').val('');
    $('input:radio[name="cat_icon"]').removeAttr('checked');
    $('#btnname').html("Create");
  });
  $('#addbtnagn').on('click', function(){
    $('#tbl').hide();
    $('#form').show();
    $(this).attr('onclick', 'bckbtn()');
    $('#cat_name').val('');
    $('#fid').val('');
    $('input:radio[name="cat_icon"]').removeAttr('checked');
    $('#btnname').html("Create");
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
    $.get('edit-category?id='+id, function(data){
      $('#tbl').hide();
      $('#form').show();
      $('#cat_name').val(data.cat_name);
      $('#cat_name').focus();
      $("input:radio[value='"+data.cat_icon+"']").attr('checked',true);
      $('#fid').val(data.id);
      $('#btnname').html("Update");
    });
  }
</script>
<?php include('layout/footer.php'); ?>     