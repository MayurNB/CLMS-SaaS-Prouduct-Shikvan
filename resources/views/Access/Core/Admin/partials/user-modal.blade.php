<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="userModalLabel">Add User</h5>
        <button type="button" class="btn-close btn-close-white" data-coreui-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="userForm">@csrf
          <input type="hidden" id="formAction" value="create">
          <input type="hidden" name="branch_id" id="branch_id">
          <input type="hidden" name="role_id" id="role_id">
          <input type="hidden" name="user_id" id="user_id">

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Username</label>
              <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="col-md-6 password-field">
              <label class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
          </div>

          <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary px-4"><i class="cil-save"></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
