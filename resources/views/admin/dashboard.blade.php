@extends('layouts.admin')

@section('Dashboard')
    Tes View
@endsection

@section('contentHeader')
الرئيسية
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.dashboard') }}" class="a">الرئيسية</a>
@endsection

@section('contentHeaderActive')
    عرض
@endsection


@section('content')
    test view
    test view
    v test view test view test view test view test view test view
@endsection
