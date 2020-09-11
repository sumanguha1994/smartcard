<?php include('layout/header.php'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">User</a>
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
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">User</p>
                </a>
            </li>
        </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="content" id="tbl">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">User Table</h4>
                <p class="card-category"> All User's listing here.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>#SL NO.</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Customer Card No</th>
                        <th>Activator</th>
                        <th>Activate Date</th>
                        <th>Deactivate Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                        for($i = 0;$i < count($customer);$i++):
                    ?>
                    <tr>
                        <td><?= $count++?></td>
                        <td><?= $customer[$i]['customer_name']?></td>
                        <td><?= $customer[$i]['customer_phone']?></td>
                        <td><?= $customer[$i]['customer_cards']?></td>
                        <td></td>
                        <td><?= $customer[$i]['activate_date']?></td>
                        <td><?= $customer[$i]['deactivate_date']?></td>
                        <td>
                            <a href="<?= base_url('delete-customer?id='.$customer[$i]['id'])?>"><i class="fa fa-trash"></i></a>
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
    $('#pr').addClass('active');
    $('#form').hide();
  });
</script>
<?php include('layout/footer.php'); ?>     