<body>
    <?php echo $header; ?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php echo $sidebar; ?>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <?php echo $topbar; ?>
                    <!-- Begin Page Content -->
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">

                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Expences Report!</h1>
                                        </div>
                                        <form class="user" action="<?php echo base_url('search-items') ?>" method="post">
                                            <?php echo csrf_field() ?>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <?php if (session()->getFlashdata('validation')) { ?>
                                                        <h1 class="h4 text-gray-900 mb-4">
                                                            <?php echo session()->getFlashdata('validation'); ?>
                                                        </h1>
                                                    <?php } ?>
                                                    <?php if (session()->getFlashdata('error')) { ?>
                                                        <h1 class="h4 text-gray-900 mb-4">
                                                            <?php echo session()->getFlashdata('error'); ?>
                                                        </h1>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="date" class="form-control form-control-user datepicker"
                                                        name="start_date" placeholder="Start Date">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="date" class="form-control form-control-user"
                                                        name="end_date" placeholder="End Date">
                                                </div>
                                            </div>
                                            </hr>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Search
                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->
                <?php echo $footer; ?>