@extends('errors::minimal')

@section('title', __('Acesso restrito'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Acesso restrito'))
