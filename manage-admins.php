<?php include('template-parts/header.php') ;?>
<?php include('template-parts/left-panel.php'); ?>
<?php
  if(isSuperAdmin($_SESSION['id']) == false){
    echo '<div class="col-md-12"><br><h3 style="color:white;">You have no permission to view this page</h3></div>';
    exit;
  }
?>
    <div id="right-panel" class="right-panel">
    <?php include('template-parts/top-bar.php'); ?>
            <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Admin table</strong>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <p>
                                <button type="button" class="btn btn-secondary mb-1 add-admin" data-toggle="modal" data-target="#addadmin">Add Admin</button>
                              </p>
                            </div>
                          </div>
                          <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Admin</th>
                                <th>Rank</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sql = "SELECT * FROM admins";
                                $result = $link->query($sql);
                              ?>
                              <?php while($admin = mysqli_fetch_object($result)): ?>
                                <?php
                                  // Temp ranks:
                                  $adminRank = $admin->rank;
                                  if($adminRank == 1){
                                    $rank = 'Super Admin';
                                  }elseif($adminRank == 2){
                                    $rank = 'Admin';
                                  }
                                ?>
                                <tr>
                                  <td>
                                    <?=strip_tags($admin->username)?>
                                  </td>
                                  <td><?=$rank?></td>
                                  <td>
                                    <a href="#" class="remove-admin admin-action" data-adminid="<?=$admin->id?>">Remove</a>
                                  </td>
                                </tr>
                              <?php endwhile; ?>
                            </tbody>
                          </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div><!-- .animated -->
            <?php include('template-parts/admin/add-admin.php'); ?>
        </div><!-- .content -->
    </div>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
          jQuery(document).on("click", "a.remove-admin",function(event) {
            if (confirm('Are you sure to remove?')) {
              var adminidSav = jQuery(this).data('adminid')
              jQuery.ajax({    //create an ajax request to display.php
                type: "GET",
                data: {
                  adminid: jQuery(this).data('adminid'),
                  csrfToken: '<?=getCurrentCsrfToken()?>'
                } ,
                url: "/admin/actions/removeAdmin.php",
                dataType: "html",   //expect html to be returned
                success: function(response){
                    jQuery('a.remove-admin[data-adminid="'+adminidSav+'"]').parent().parent().hide(300);
                }
              }); // end ajax
            } // end confirm
          });
      } );

    </script>

</body>
</html>
