@extends('layouts.app')

@section('page')
    <dashboard :user="{{Auth::user()}}"/>
@endsection