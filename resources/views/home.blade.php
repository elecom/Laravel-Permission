@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ut, corrupti quam est recusandae facilis consectetur doloribus numquam ipsam quasi beatae. Aliquam beatae totam ea quaerat explicabo dignissimos, fugit tenetur.</p>

    {{-- Minimal --}}
    <x-adminlte-modal id="modalMin" title="Minimal"/>
    {{-- Example button to open modal --}}
    <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalMin"/>

    {{-- Themed --}}
<x-adminlte-modal id="modalPurple" title="Theme Purple" theme="purple"
icon="fas fa-bolt" size='lg'>
This is a purple theme modal without animations.
</x-adminlte-modal>
{{-- Example button to open modal --}}
<x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalPurple" class="bg-purple"/>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop