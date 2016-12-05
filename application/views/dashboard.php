
    <?php $this->load->view('inc/top'); ?>

    <!-- Left side column. contains the logo and sidebar -->
    <?php //$this->load->view('aside'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <?php $this->view('summary'); ?>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-xs4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h2>Status Backing Up</h2>
                            <div class="top pull-right">

                            </div>
                            <div class="box-pane pull-right">
                                <span class="mif-database fg-green">정상</span>
                                <span style="padding-left:10px;"></span>
                                <span class="mif-database fg-yellow">진행중</span>
                                <span style="padding-left:10px;"></span>
                                <span class="mif-database fg-red">오류 확인</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Maria DB Section</h3>
                            <div class="box-tools pull-right">
                                <span class="label label-primary">Label</span>
                            </div>
                        </div>
                        <div clas="box-body">
                            <ul class="users-list clearfix">
                                <li><a href="/detail"><span class="mif-database mif-4x fg-green"></span><p><strong>Redmarker</strong></p></a></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>WCUS</strong></p></li>
                                <li><span class="mif-database mif-4x fg-yellow"></span><p><strong>Blacsom</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>100forest</strong></p></li>
                            </ul>
                            <ul class="users-list clearfix">
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>outroshop</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>jinnykim</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>justjinny</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>global wizwid</strong></p></li>
                            </ul>
                            <ul class="users-list clearfix">
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>magento db1</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>magento db2</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>magento db3</strong></p></li>
                                <li><span class="mif-database mif-4x fg-red"></span><p><strong>magento db4</strong></p></li>
                            </ul>
                        </div>
                        <div class="box-footer">
                            <div class="small-box text-center ">
                                <span class="text-blue"><i class="ion ion-android-cloud-done"></i> Success : 10 </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-yellow"><i class="ion ion-android-download"></i> Process : 1 </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-red"><i class="ion ion-android-cloud"></i> Fail : 1 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Oracle DB Section</h3>
                            <div class="box-tools pull-right">
                                <span class="label label-primary">Label</span>
                            </div>
                        </div>
                        <div clas="box-body no-padding">
                            <ul class="users-list clearfix">
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>wizwid</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>recobell</strong></p></li>
                                <li><span class="mif-database mif-4x fg-yellow"></span><p><strong>wms</strong></p></li>
                                <li><span class="mif-database mif-4x fg-yellow"></span><p><strong>wizems</strong></p></li>
                            </ul>
                            <ul class="users-list clearfix">
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>cbutf8</strong></p></li>
                                <li><span class="mif-database mif-4x fg-yellow"></span><p><strong>dw</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>mango+</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>mango+ kr</strong></p></li>
                            </ul>
                            <ul class="users-list clearfix">
                                <li><span class="mif-database mif-4x fg-red"></span><p><strong>oracle db</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>oracle db</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>oracle db</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>oracle db</strong></p></li>
                            </ul>
                        </div>
                        <div class="box-footer">
                            <div class="small-box text-center ">
                                <span class="text-blue"><i class="ion ion-android-cloud-done"></i> Success : 8 </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-yellow"><i class="ion ion-android-download"></i> Process : 3 </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-red"><i class="ion ion-android-cloud"></i> Fail : 1 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Mssql DB Section</h3>
                            <div class="box-tools pull-right">
                                <span class="label label-primary">Label</span>
                            </div>
                        </div>
                        <div clas="box-body">
                            <ul class="users-list clearfix">
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>IR</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>netpion</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>itline</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>anysotre</strong></p></li>
                            </ul>
                            <ul class="users-list clearfix">
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>favinit</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>gsm</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>mssql db</strong></p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p><strong>mssql db</strong></p></li>
                            </ul>
                            <ul class="users-list clearfix">
                                <li><span class="mif-database mif-4x fg-green"></span><p>mssql db</p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p>mssql db</p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p>mssql db</p></li>
                                <li><span class="mif-database mif-4x fg-green"></span><p>mssql db</p></li>
                            </ul>
                        </div>
                        <div class="box-footer">
                            <div class="small-box text-center ">
                                <span class="text-blue"><i class="ion ion-android-cloud-done"></i> Success : 12 </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-yellow"><i class="ion ion-android-download"></i> Process : 0 </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-red"><i class="ion ion-android-cloud"></i> Fail : 0 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view("inc/footer"); ?>
    <div class="control-sidebar-bg"></div>

<?php $this->load->view("inc/footer_script"); ?>
