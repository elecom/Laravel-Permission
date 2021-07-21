<div class="form-row">
    <div class="form-group col-md-12">
      <label for="input_NewNameRole">{{ __('adminlte::adminlte.text_name') }}</label>
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-list"></i></span>
        </div>  
        <input type="text" class="form-control" id="input_NewNameRole" name="input_NewNameRole">
      </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
      <label for="select_NewStatusRole">{{ __('adminlte::adminlte.text_status') }}</label>
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-list"></i></span>
        </div>  
        <select class="form-control" id="select_NewStatusRole" name="select_NewStatusRole">
          <option value="">SELECCIONAR</option>
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
    </div>
</div>
<div class="form-row mb-1">
  <div class="form-group col-md-12 col-12">
    <label>Agregar Permiso(s)</label>
  </div>
</div>
<div class="form-row">
  <div id="view-permissions" class="form-group col-md-12 border-warning p-2">
  </div>
</div>