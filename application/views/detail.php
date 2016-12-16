
<?php $this->load->view('inc/top'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height:901px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            See Details
            <small>Contents View</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">See Details</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-5">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2>Database</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Host IP:</th>
                                        <td><?php echo $instance->HOSTNAME;;?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Disk Size:</th>
                                        <td><?php echo $instance->STORAGESIZE; ?>G</td>
                                    </tr>
                                    <tr>
                                        <th>Usage :</th>
                                        <td>24Gb</td>
                                    </tr>
                                    <tr>
                                        <th>Spec:</th>
                                        <td>Quard Core, Ram 64Gb</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <div class="tab-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>일자</th>
                                        <th>파일명</th>
                                        <th>크기</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($item as $k => $v) { ?>
                                    <tr>
                                        <td><?php echo date("Y-m-d", strtotime($v->REGDATE)); ?></td>
                                        <td><?php echo $v->FILENAME; ?></td>
                                        <td>file size : <?php echo formatSizeUnits($v->FILESIZE); ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer no-padding">

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