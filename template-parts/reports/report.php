<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="report" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warning">Create Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                  <form action="/admin/actions/reports.php" method="SELF">
                    <input type="hidden" name="userid" value="<?=$userid?>">
                    <input type="hidden" name="byadmin" value="<?=$_SESSION['username'];?>">
                    <input type="hidden" name="action" value="report">

                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Type</label>
                          <select name="type" class="form-control">
                            <option value="vmd">VDM</option>
                            <option value="rdm">RDM</option>
                            <option value="abusive-language">Abusive Language</option>
                            <option value="exploiting">Exploiting</option>
                            <option value="cheating-hacking">Cheating/Hacking</option>
                            <option value="fail-rp">Fail RP</option>
                            <option value="rule-breaking">Rule breaking</option>
                            <option value="ignoring-admin">Ignoring Admin</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Comment</label>
                          <input type="text" name="comment" class="form-control" placeholder="Comment">
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
