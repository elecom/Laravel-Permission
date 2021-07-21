@extends('adminlte::page')

@section('title', __('adminlte::adminlte.users'))

@section('content_header')
    <h1></h1>
@stop

@section('content')
    {{-- DATATABLE --}}
    @php
    $heads = [
        __('adminlte::adminlte.name_of_profile'),
        __('adminlte::adminlte.status'),
        ['label' => __('adminlte::adminlte.table_buttons_actions'), 'no-export' => true, 'width' => 5],
    ];

    $btnEdit = '<button class="btn btn-xs btn-default text-warning mx-1" title="'.__('adminlte::adminlte.edit').'">
                    <i class="fa fa-lg fa-fw fa-edit"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1" title="'.__('adminlte::adminlte.delete').'">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    /*$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1" title="'.__('adminlte::adminlte.details').'">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </button>';*/

    $config = [
        'data' => [
            ['Editor', 'Activo',  '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            ['Visor', 'Inactivo', '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            ['Administrador', 'Activo', '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

    @endphp

    <!-- TABLE ROLES -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="color: #776F6E">
                <i class="fas fa-lg fa-lock"></i>
                <strong>{{ __('adminlte::adminlte.roles_list') }}</strong>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-info" id="btnNewRole" title="{{__('adminlte::adminlte.text_new_role')}}"><i class="fas fa-lock"><label>+</label></i></button>
                <!--<button type="button" class="btn btn-sm btn-info" id="btnEditProfile" title="{{__('adminlte::adminlte.text_edit_role')}}"><i class="fas fa-lock"><label>e</label></i></button>-->
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table" id="tableRoles" style="width: 100%">
                    <thead>
                        <tr style="color: #776F6E">
                            <th style="width: 80%">{{__('adminlte::adminlte.name_of_role')}}</th>
                            <th>{{__('adminlte::adminlte.text_status')}}</th>
                            <th style="width: 15%;" class="text-center">{{__('adminlte::adminlte.table_buttons_actions')}}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>

    <!-- TABLE USERS -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="color: #776F6E">
                <i class="fas fa-lg fa-users"></i>
                <strong>{{ __('adminlte::adminlte.list_of_users') }}</strong>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-info" id="btnNewUser" title="{{__('adminlte::adminlte.text_new_user')}}"><i class="fas fa-user-plus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table" id="tableUsers" style="width: 100%">
                    <thead>
                        <tr style="color: #776F6E">
                            <th>{{__('adminlte::adminlte.text_user')}}</th>
                            <th>{{__('adminlte::adminlte.text_email')}}</th>
                            <th>{{__('adminlte::adminlte.text_role')}}</th>
                            <th>{{__('adminlte::adminlte.text_level')}}</th>
                            <th>{{__('adminlte::adminlte.text_status')}}</th>
                            <th>{{__('adminlte::adminlte.table_buttons_actions')}}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>

    <!-- MODAL NEW ROLE -->
    <div class="modal fade" id="modalNewRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="formNewRole">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('adminlte::adminlte.text_new_role')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            
                    <div class="modal-body">
                    @include('admin.users.new-role')      
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('adminlte::adminlte.text_button_close') }}</button>
                        <button type="submit" class="btn btn-secondary" name="btnSaveRole" id="btnSaveRole">{{ __('adminlte::adminlte.text_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT ROLE -->
    <div class="modal fade" id="modalEditRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" id="formEditRole">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('adminlte::adminlte.text_edit_role') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            
                    <div class="modal-body">
                    @include('admin.users.edit-role')        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('adminlte::adminlte.text_button_close') }}</button>
                        <button type="submit" class="btn btn-secondary" name="btnUpdateRole" id="btnUpdateRole">{{ __('adminlte::adminlte.text_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL NEW USER -->
    <div class="modal fade" id="modalNewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" id="formNewUser">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('adminlte::adminlte.text_new_user')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            
                    <div class="modal-body">
                    @include('admin.users.new-user')      
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('adminlte::adminlte.text_button_close') }}</button>
                        <button type="submit" class="btn btn-secondary" name="btnSaveUser" id="btnSaveUser">{{ __('adminlte::adminlte.text_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT USER -->
    <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" id="formEditUser">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('adminlte::adminlte.text_edit_user') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            
                    <div class="modal-body">
                    @include('admin.users.edit-user')        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('adminlte::adminlte.text_button_close') }}</button>
                        <button type="submit" class="btn btn-secondary" name="btnUpdateUser" id="btnUpdateUser">{{ __('adminlte::adminlte.text_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('plugins.Datatables', true)

@section('plugins.Datatables-Plugins', true)

@section('plugins.Sweetalert2', true)

@section('plugins.JQueryValidation', true)

@push('js')
    <script src="{{ asset('js/users.js') }}"></script>
@endpush