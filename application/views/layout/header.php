<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Smart Crad | Panel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard" />
  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, free dashboard, free admin dashboard, free bootstrap 4 admin dashboard">
  <meta name="description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Material Dashboard by Creative Tim">
  <meta itemprop="description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Material Dashboard by Creative Tim">
  <meta name="twitter:description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Material Dashboard by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?= base_url('/dashboard')?>" />
  <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg" />
  <meta property="og:description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
  <meta property="og:site_name" content="Creative Tim" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?= base_url('assets/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'); ?>">
  <!-- CSS Files -->
  <link href="<?= base_url('assets/css/material-dashboard.min1c51.css?v=2.1.2'); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('assets/demo/demo.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/demo/styleagn.css'); ?>" rel="stylesheet" />
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '<?= base_url('gtm5445.html?id=')?>' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
</head>
<body class="">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url('assets/img/sidebar-1.jpg') ?>">
      <div class="logo"><a href="<?= base_url('/dashboard')?>" class="simple-text logo-normal">
          SMART CARD
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item" id="dash" >
            <a class="nav-link" href="<?= base_url('/dashboard')?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if($this->session->userdata('loginrole') != 'franchise'):?>
          <li class="nav-item" id="cat" >
            <a class="nav-link" href="<?= base_url('/category')?>">
              <i class="material-icons">category</i>
              <p>category</p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item" id="member">
            <a class="nav-link" href="<?= base_url('member')?>">
              <i class="material-icons">facebook</i>
              <p>Franchise</p>
            </a>
          </li>
          <li class="nav-item" id="sk">
            <a class="nav-link" href="<?= base_url('shopkeeper')?>">
              <i class="material-icons">store</i>
              <p>Shop</p>
            </a>
          </li>
          <li class="nav-item" id="pr">
            <a class="nav-link" href="<?= base_url('user')?>">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item" id="card">
            <a class="nav-link" href="<?= base_url('card')?>">
              <i class="material-icons">credit_card</i>
              <p>Cards</p>
            </a>
          </li>
          <li class="nav-item" id="ic">
            <a class="nav-link" href="<?= base_url('issue-card')?>">
              <i class="material-icons">redeem</i>
              <p>Issue Cards</p>
            </a>
          </li>
          <li class="nav-item" id="ic">
            <a class="nav-link" href="<?= base_url('issue-user')?>">
              <i class="material-icons">assignment_ind</i>
              <p>Issue User</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">