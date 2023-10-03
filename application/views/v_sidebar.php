<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="bg-user-panel">
                <img src="<?php echo base_url('assets/images/bg-blur.jpg') ?>" alt="User Image" />
            </div>
            <div class="image img_circle">
                <img src="<?php echo base_url('assets/images/user.jpg') ?>" alt="User Image" />
            </div>
            <div class="info">
                <p style="color: #fff;"><?php echo $currUser; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li id="sidebar-dashboard" class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li id="sidebar-surat"><a href="#"><i class="fa  fa-plus" ></i>Input Surat Keterangan</a></li>


            <li id="sidebar-cari"><a href="#"><i class="fa fa-search"></i> Cari Surat Keterangan</a></li>
            
             <?php if ($this->session->userdata('jenis')=='superadmin') {
               echo ' <li id="sidebar-user"><a href="#"><i class="fa fa-user"></i> Tambah User</a></li>'; 
            } ?>
            

           
           

            


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
