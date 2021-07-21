<div class="form-row">
    <div class="form-group col-md-6 col-12">
      <label for="input_NewNameUser">{{ __('adminlte::adminlte.text_name') }}</label>
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>  
        <input type="text" class="form-control" id="input_NewNameUser" name="input_NewNameUser">
      </div>
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="input_NewEmailUser">{{ __('adminlte::adminlte.text_email') }}</label>
        <div class="input-group input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
          </div>  
          <input type="text" class="form-control" id="input_NewEmailUser" name="input_NewEmailUser">
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 col-12">
        <label for="input_NewPasswordUser">{{ __('adminlte::adminlte.password') }}</label>
        <div class="input-group input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>  
          <input type="password" class="form-control" id="input_NewPasswordUser" name="input_NewPasswordUser">
        </div>
      </div>
      <div class="form-group col-md-6 col-12">
          <label for="input_NewConfirmPasswordUser">{{ __('adminlte::adminlte.retype_password') }}</label>
          <div class="input-group input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>  
            <input type="password" class="form-control" id="input_NewConfirmPasswordUser" name="input_NewConfirmPasswordUser">
          </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 col-12">
        <label for="select_NewRoleUser">{{ __('adminlte::adminlte.text_role') }}</label>
        <div class="input-group input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
          </div>  
          <select class="form-control" id="select_NewRoleUser" name="select_NewRoleUser"></select>
        </div>
    </div>
    <div class="form-group col-md-6 col-12">
          <label for="input_NewStatusUser">{{ __('adminlte::adminlte.text_status') }}</label>
          <div class="input-group input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>  
            <select class="form-control" id="input_NewStatusUser" name="input_NewStatusUser">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
          </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 col-12">
        <input type="checkbox" id="checkbox_NewAdminUser" name="checkbox_NewAdminUser">
        {{ __('adminlte::adminlte.text_message_admin') }}
    </div>
</div>