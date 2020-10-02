<?php include('layout/header.php'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">Cards</a>
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
                    <i class="material-icons">credit_card</i>
                    <p class="d-lg-none d-md-block">Cards</p>
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
            <div class="card-header card-header-success">
                <h4 class="card-title">Card Added</h4>
                <p class="card-category">Create New Card</p>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('create-card')?>">
                <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                          <label class="bmd-label-floating">Card No.</label>
                          <input type="text" name="cardno[]" id="cardno" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label class="bmd-label-floating"></label>
                        <button type="button" class="btn btn-info" onclick="addform()"><i class="fa fa-plus"></i></button>
                    </div>
                    </div>
                </div>
                <div class="add"></div>
                <button type="submit" class="btn btn-success pull-right"><span id="btnname">Create</span>  Card</button>
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
          <?php for($i = 0;$i < count($card);$i++): ?>
            <div class="col-md-3">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                    <p class="card-category">
                        <span style="color:#01070c"><?= $card[$i]['cardno']?></span>
                    </p>
                </div>
                <div class="card-body">
                  <p><?= $card[$i]['status']?></p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="#!" onclick="editme(<?= $card[$i]['id']?>)"><i class="material-icons">create</i></a> |
                    <a href="<?= base_url('delete-card?id='.$card[$i]['id'])?>" class="text-left"><i class="material-icons">delete</i> </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
    </div>
</div>
<script>
  $(document).ready(function(){
    $('#card').addClass('active');
    $('#form').hide();
  });
  //addbtn
  $('#addbtn').on('click', function(){
    $('#tbl').hide();
    $('#form').show();
    $(this).attr('onclick', 'bckbtn()');
    $('#cardno').val('');
    $('#btnname').html("Create");
  });
  //bckbtn
  function bckbtn()
  {
    $('#tbl').show();
    $('#form').hide();
    $('#addbtn').removeAttr('onclick');
  }
  //editbtn
  function editme(cno)
  {
    $('#tbl').hide();
    $('#form').show();
    $.get('edit-card?id='+cno, function(data){
      $('#cardno').val(data.cardno);
      $('#cardno').focus();
      $('#fid').val(data.id);
      $('#btnname').html("Update");
    });
  }
  var id = 1;
  function addform()
  {
    let htmldiv;
    htmldiv = '<div class="row addformdiv'+id+'"><div class="col-md-10"><div class="form-group">';
    htmldiv += '<label class="bmd-label-floating">Card No.</label>';
    htmldiv += '<input type="text" name="cardno[]" id="cardno" class="form-control">';
    htmldiv += '</div></div><div class="col-md-2">';
    htmldiv += '<div class="form-group">';
    htmldiv += '<label class="bmd-label-floating"></label>';
    htmldiv += '<button type="button" class="btn btn-warning" onclick="delform('+id+')"><i class="fa fa-minus"></i></button>';
    htmldiv += '</div></div></div>';
    $('.add').append(htmldiv);
    id++;
  }
  function delform(i)
  {
    $('.addformdiv'+i).html('');
  }
</script>
<?php include('layout/footer.php'); ?>     