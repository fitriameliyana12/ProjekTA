
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a> 
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a> 
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a> 
          </div>
          <div class="col-lg-3 text-right">
            <a href="<?php echo base_url(); ?>assets/login.html" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
            <a href="<?php echo base_url(); ?>assets/register.html" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="<?php echo base_url(); ?>assets/index.html" class="d-block">
              <img src="<?php echo base_url(); ?>assets/images/logo.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="<?php echo base_url(); ?>assets/index.html" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="<?php echo site_url('about');?>" class="nav-link text-left">About Us</a>
                  <ul class="dropdown">
                    <li><a href="<?php echo site_url('guru');?>">Our Teachers</a></li>
                    <li><a href="<?php echo base_url(); ?><?php echo site_url('siswa');?>">Our Student</a></li>
                    <li><a href="<?php echo site_url('guru');?>">">Our School</a></li>
                  </ul>
                </li>
                <li>
                  <a href="<?php echo site_url('download');?>">" class="nav-link text-left">Download</a>
                </li>
                <li>
                  <a href="<?php echo site_url('jadwal');?>">Schedule</a>
                </li>
                <li>
                    <a href="<?php echo site_url('contact');?>">" class="nav-link text-left">Contact</a>
                  </li>
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

          </div>
