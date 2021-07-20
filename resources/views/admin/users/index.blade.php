@extends('adminlte::page')

@section('title', __('adminlte::adminlte.users'))

@section('content_header')
    <h1>{{ __('adminlte::adminlte.users') }}</h1>
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
            <table class="table" style="width: 100%">
                <thead>
                    <tr style="color: #776F6E">
                        <th>{{__('adminlte::adminlte.text_user')}}</th>
                        <th>{{__('adminlte::adminlte.text_email')}}</th>
                        <th>{{__('adminlte::adminlte.text_profile')}}</th>
                        <th>{{__('adminlte::adminlte.text_level')}}</th>
                        <th>{{__('adminlte::adminlte.text_status')}}</th>
                        <th>{{__('adminlte::adminlte.table_buttons_actions')}}</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="card-footer"></div>
    </div>
@endsection