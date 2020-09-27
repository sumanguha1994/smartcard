<?php include('layout/header.php'); ?>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">Issue Cards</a>
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
                    <i class="material-icons">redeem</i>
                    <p class="d-lg-none d-md-block">Issue Cards</p>
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
                <h4 class="card-title">Issue Crad</h4>
                <p class="card-category">Create Issue Card</p>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('create-issuecard')?>">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Select</label>
                        <select name="issueto" id="issueto" class="form-control">
                          <?php if($this->session->userdata('loginrole') != 'franchise'):?>
                            <option value="null" disabled>Choose Shop...</option>
                            <option value="Franchise">Franchise</option>
                            <option value="Shop">Shop</option>
                          <?php else: ?>
                            <option value="null" disabled>Choose Shop...</option>
                            <option value="Shop">Shop</option>
                          <?php endif; ?>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group namediv"></div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group card">
                        <label class="bmd-label-floating">Cards</label>
                        <select data-placeholder="Choose Cards..." multiple class="chosen-select" name="cardno[]" id="cardno">
                            <?php for($j = 0;$j < count($cards);$j++): ?>
                                <option value="<?= $cards[$j]['id']?>"><?= $cards[$j]['cardno']?> &nbsp; (<?= $cards[$j]['status']?>)</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right"><span id="btnname">Create</span> Issue Card</button>
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
                <h4 class="card-title ">Issue Card Table</h4>
                <p class="card-category"> All Issue Card's listing here.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>#SL NO.</th>
                        <th>Issued To</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Cards</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                        for($i = 0;$i < count($is);$i++):
                    ?>
                    <tr>
                        <td><?= $count++?></td>
                        <td><?= $is[$i]['issuefor']?></td>
                        <td><?= $is[$i]['issueto']?></td>
                        <td><?= $is[$i]['issuetoph']?></td>
                        <td><?= $is[$i]['card_no']?>&nbsp;&nbsp;(<?= $is[$i]['cstat']?>)</td>
                        <td>
                            <a href="#!" onclick="editme(<?= $is[$i]['id']?>)"><i class="fa fa-edit"></i></a> | 
                            <a href="<?= base_url('delete-issuecard?id='.$is[$i]['id'])?>"><i class="fa fa-trash"></i></a>
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
    $('#ic').addClass('active');
    $('#form').hide();
  });
  $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  });
  //addbtn
  $('#addbtn').on('click', function(){
    $('#tbl').hide();
    $('#form').show();
    $(this).attr('onclick', 'bckbtn()');
    $('#issueto').val('');
    $('#btnname').html("Create");
    $('#cardno').removeAttr('disabled');
    $('#shname').val('');
    $('.chosen-select').val('');
    $('#fid').val('');
  });
  //bckbtn
  function bckbtn()
  {
    $('#tbl').show();
    $('#form').hide();
    $('#addbtn').removeAttr('onclick');
    $('#cardno').removeAttr('disabled');
  }
  //edit 
  function editme(id)
  {
    $.get('edit-issuecard?id='+id, function(data){
      $('#tbl').hide();
      $('#form').show();
      issuefun(data.issuefor);
      $('#issueto').val(data.issuefor);
      $("#cardno option[value='"+data.cardno+"']").attr('selected', 'selected');
      var cardval = $("#cardno option[value='"+data.cardno+"']").html();
      $('#cardno').attr('disabled', true);
      $('ul.chosen-choices').html('<li class="search-choice"><span>'+cardval+'</span></li>');
      $('#fid').val(data.id);
      if(data.issuefor == 'Franchise'){
        $('#shname option[value="'+data.frname+'"]').attr('selected', 'selected');
      }else{
        $('#shname option[value="'+data.shname+'"]').attr('selected', 'selected');
      }
      $('#btnname').html("Update");
    });
  }
  $('#issueto').on('change', function(){
    let issueto = $(this).val();
    issuefun(issueto);
  });
  function issuefun(issueto)
  {
    $.get('get-name?issueto='+issueto, function(data){
        $('.namediv').html('');
        let makehtml;
        makehtml = '<label class="bmd-label-floating">Name</label>';
        makehtml += '<select name="name" id="shname" class="form-control">';
        makehtml += '<option value="null" disabled>Choose '+issueto+'...</option>';
        for(let i = 0;i < data.length;i++)
        {
            makehtml += '<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
        }
        makehtml += '</select>';
        $('.namediv').append(makehtml);
    });
  }
</script>
<?php include('layout/footer.php'); ?>     