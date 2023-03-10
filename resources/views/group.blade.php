@extends('layouts.app')

@section('page')
    <group :user="{{Auth::user()}}" />
@endsection