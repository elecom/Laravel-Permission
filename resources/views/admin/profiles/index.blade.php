@extends('adminlte::page')

@section('title', __('adminlte::adminlte.profiles'))

@section('content_header')
    <h1>{{ __('adminlte::adminlte.profiles') }}</h1>
@stop

@section('content')
    {{-- DATATABLE --}}
    @php
    $heads = [
        __('adminlte::adminlte.name_of_profile'),
        __('adminlte::adminlte.status'),
        ['label' => __('adminlte::adminlte.table_buttons_actions'), 'no-export' => true, 'width' => 5],
    ];

    $btnEdit = '<button class="btn btn-xs btn-default text-warning mx-1" title="'.__('adminlte::adminlte.table_button_edit').'">
                    <i class="fa fa-lg fa-fw fa-edit"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1" title="'.__('adminlte::adminlte.table_button_delete').'">
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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="color: #776F6E">
                <i class="fas fa-lg fa-lock"></i>
                <strong>{{ __('adminlte::adminlte.profile_list') }}</strong>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-info" id="btnNewProfile" title="{{__('adminlte::adminlte.text_new_profile')}}"><i class="fas fa-lock"><label>+</label></i></button>
                <button type="button" class="btn btn-sm btn-info" id="btnEditProfile" title="{{__('adminlte::adminlte.text_edit_profile')}}"><i class="fas fa-lock"><label>e</label></i></button>
            </div>
        </div>
        <div class="card-body">
            <table class="table" style="width: 100%">
                <thead>
                    <tr style="color: #776F6E">
                        <th style="width: 80%">{{__('adminlte::adminlte.name_of_profile')}}</th>
                        <th>{{__('adminlte::adminlte.text_status')}}</th>
                        <th style="width: 15%;" class="text-center">{{__('adminlte::adminlte.table_buttons_actions')}}</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="card-footer"></div>
    </div>

    <!-- MODAL NEW PROFILE -->
    <div class="modal fade" id="modalNewProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="formNewProfile">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('adminlte::adminlte.text_new_profile')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            
                    <div class="modal-body">
                    @include('admin.profiles.new')      
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('adminlte::adminlte.text_button_close') }}</button>
                        <button type="submit" class="btn btn-secondary" name="btnSaveProfile" id="btnSaveProfile">{{ __('adminlte::adminlte.text_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT PROFILE -->
    <div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="formEditProfile">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('adminlte::adminlte.text_edit_profile') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                <div class="modal-body">
                @include('admin.profiles.edit')        
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('adminlte::adminlte.text_button_close') }}</button>
                    <button type="submit" class="btn btn-secondary" name="btnUpdateProfile" id="btnUpdateProfile">{{ __('adminlte::adminlte.text_save') }}</button>
                </div>
            </form>
        </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('storage/js/profile.js')}}"></script>
@endpush