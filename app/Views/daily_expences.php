<body>
<?php  echo $header; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <?php echo $sidebar;?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

           
            <?php echo $topbar;?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Report of Expences</h1>
                    <p class="mb-4">Report of Expences .</p>

                    <a href="<?php echo base_url('add_expence')?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        <span class="text">Add Expences</span>
                    </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Item</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php  foreach($result as $row) { ?>
                                        <tr>
                                            <td><?= $row['item_name'] ;?></td>
                                            <td><?= $row['price'] ;?></td>
                                            <td><?= $row['InsertDate'] ;?></td>
                                            <td><button class="btn btn-sm btn-warning" id="" onClick="delete_item(<?= $row['item_id'] ;?>)">delete</button></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php  echo $footer; ?>
         <script type="text/javascript" >
            $(document).ready(function () {
                    $('#dataTable').DataTable();
            });
            $('#delete').click(function(){
                $id=$('#delete').val();
                alert($id);
            });

            function delete_item(id) {
   $.ajax({
      url: '/delete',
      type: 'POST',
      data: { id: id },
     // dataType: 'json',
      success: function(data) {
        //
        alert(data);
        location.reload();
        $('#dataTable').DataTable().ajax.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (jqXHR.status === 0) {
         alert('Not connect.\n Verify Network.');
      } else if (jqXHR.status == 404) {
         alert('Requested page not found. [404]');
      } else if (jqXHR.status == 500) {
         alert('Internal Server Error [500].');
      } else if (textStatus === 'parsererror') {
         alert('Requested JSON parse failed.');
      } else if (textStatus === 'timeout') {
         alert('Time out error.');
      } else if (textStatus === 'abort') {
         alert('Ajax request aborted.');
      } else {
         alert('Uncaught Error.\n' + jqXHR.responseText);
      }
      }
   });
}
         </script>