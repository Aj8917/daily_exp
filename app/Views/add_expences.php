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
                <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> Expences!</h1>
                            </div>
                            <form class="user" action="<?php echo base_url('save')?>" method="post">

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <?php if(session()->getFlashdata('validation')){ ?>
                                        <h1 class="h4 text-gray-900 mb-4" >
                                            <?php echo session()->getFlashdata('validation');?>
                                        </h1>
                                <?php }?>
                                <?php if(session()->getFlashdata('success')){?>
                                    <h1 class="h4 text-gray-900 mb-4" >
                                            <?php echo session()->getFlashdata('success');?>
                                        </h1>

                                <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="item_name"
                                            placeholder="Item Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="price"
                                            placeholder="Price">
                                    </div>
                                </div>
</hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                     Save
                                </button>

                                </form> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

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