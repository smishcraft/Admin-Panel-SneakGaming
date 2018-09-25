<div class="modal fade" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="addadmin" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addadmin">Create Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                  <form action="/admin/actions/addAdmin.php" method="SELF">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Type</label>
                          <select name="rank" class="form-control">
                            <option value="2">Admin</option>
                            <option value="1">Super Admin</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Username">
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <input type="submit" name="ban" value="Create">
                      </div>
                    </div>
                  </form>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
