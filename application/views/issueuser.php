<?php include('layout/header.php'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">Issue User</a>
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
                    <i class="material-icons">assignment_ind</i>
                    <p class="d-lg-none d-md-block">Issue User</p>
                </a>
            </li>
        </ul>
    </div>
  </div>
</nav>
<div class="content" id="form">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Issue User</h4>
                <p class="card-category">Issue Card To User</p>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('create-issueuser')?>">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Customer Name</label>
                        <input type="text" name="customer_name" id="custname" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Customer Phone No.</label>
                        <input type="text" name="customer_phone" id="custphno" class="form-control">
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group namediv">
                        <label class="bmd-label-floating">Cards.</label>
                        <select name="cardid" id="card" class="form-control">
                            <option value="null" selected disabled>Cards...</option>
                            <?php for($i = 0;$i < count($cards);$i++): ?>
                                <option value="<?= $cards[$i]['id']?>"><?= $cards[$i]['cardno']?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Issue User</button>
                <div class="clearfix"></div>
                </form>
            </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php include('layout/footer.php'); ?>   