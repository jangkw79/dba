
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
                            <?php $i=0; ?>
                            <?php foreach($maria as $obj) {
                                switch($obj->BACKUPSTATUS) {
                                    case("S") :  $icon_stat = "fg-green"; break;
                                    case("F") :  $icon_stat = "fg-red"; break;
                                    default   :  $icon_stat = "fg-yellow"; break;
                                }
                            ?>
                            <?php if($i++%4 == 0) { ?>
                            <ul class="users-list clearfix">
                            <?php } ?>
                                <li><a href="/detail?dbname=<?php echo $obj->DBNAME;?>&seq=<?php echo $obj->seq; ?>"><span class="mif-database mif-4x <?php echo $icon_stat; ?>"></span><p><strong><?php echo $obj->DBNAME; ?></strong></p></a></li>
                            <?php if($i%4 == 0) { ?>
                            </ul>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="box-footer">
                            <div class="small-box text-center ">
                                <span class="text-blue"><i class="ion ion-android-cloud-done"></i> Success : <?php echo $item["Maria"]["success"]; ?> </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-yellow"><i class="ion ion-android-download"></i> Process : <?php echo count($maria)-$item["Maria"]["success"]-$item["Maria"]["fail"]; ?> </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-red"><i class="ion ion-android-cloud"></i> Fail : <?php echo $item["Maria"]["fail"]; ?> </span>
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
                            <?php $i=0; ?>
                            <?php foreach($oracle as $obj) {
                                switch($obj->BACKUPSTATUS) {
                                    case("S") :  $icon_stat = "fg-green"; break;
                                    case("F") :  $icon_stat = "fg-red"; break;
                                    default   :  $icon_stat = "fg-yellow"; break;
                                }
                            ?>
                                <?php if($i++%4 == 0) { ?>
                                    <ul class="users-list clearfix">
                                <?php } ?>
                                <li><a href="/detail?seq=<?php echo $obj->seq; ?>"><span class="mif-database mif-4x <?php echo $icon_stat; ?>"></span><p><strong><?php echo @$obj->DBNAME; ?></strong></p></a></li>
                                <?php if($i%4 == 0) { ?>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="box-footer">
                            <div class="small-box text-center ">
                                <span class="text-blue"><i class="ion ion-android-cloud-done"></i> Success : <?php echo $item["Oracle"]["success"]; ?> </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-yellow"><i class="ion ion-android-download"></i> Process : <?php echo count($oracle)-$item["Oracle"]["success"]-$item["Oracle"]["fail"]; ?> </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-red"><i class="ion ion-android-cloud"></i> Fail : <?php echo $item["Oracle"]["fail"]; ?> </span>
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
                            <?php $i=0; ?>
                            <?php foreach($mssql as $obj) {
                                switch($obj->BACKUPSTATUS) {
                                    case("S") :  $icon_stat = "fg-green"; break;
                                    case("F") :  $icon_stat = "fg-red"; break;
                                    default   :  $icon_stat = "fg-yellow"; break;
                                }
                            ?>
                                <?php if($i++%4 == 0) { ?>
                                    <ul class="users-list clearfix">
                                <?php } ?>
                                <li><a href="/detail?seq=<?php echo $obj->seq; ?>"><span class="mif-database mif-4x <?php echo $icon_stat; ?>"></span><p><strong><?php echo @$obj->DBNAME; ?></strong></p></a></li>
                                <?php if($i%4 == 0) { ?>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="box-footer">
                            <div class="small-box text-center ">
                                <span class="text-blue"><i class="ion ion-android-cloud-done"></i> Success : <?php echo $item["Mssql"]["success"]; ?> </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-yellow"><i class="ion ion-android-download"></i> Process : <?php echo @count($mssql)-$item["Mssql"]["success"]-$item["Mssql"]["fail"]; ?> </span>
                                <span style="padding-left:10px;"></span>
                                <span class="text-red"><i class="ion ion-android-cloud"></i> Fail : <?php echo $item["Mssql"]["fail"]; ?> </span>
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
