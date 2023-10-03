<!-- Content Header (Page header) -->
<section class="content-header">
    <h1></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Preloader -->
    <div id="preloader" style="display: none;">
        <div class="box" style="height: 80px;">
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>

    <div id="main-content" class="row"></div><!-- .row -->

</section><!-- /.content-->

<!-- Modals -->

<div id="modal-preloader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box" style="height: 80px; box-shadow: none; border-width: 0px;">
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var sidebar=getCookie('sidebar');
        if(sidebar=='pencarian') $('#sidebar-'+sidebar).click();
        else if(sidebar) $('#sidebar-'+sidebar).click();
        else $('#sidebar-dashboard').click();
    });
</script>
