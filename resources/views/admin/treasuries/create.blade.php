@extends('layouts.admin')

@section('title')
    بيانات الخزن
@endsection

@section('contentHeader')
    الخزن
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.treasuries.index') }}">اضافة خزنة</a>
@endsection

@section('contentHeaderActive')
    بيانات الخزن
@endsection

@php
    dd(session()->all());
@endphp

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mx-auto">
                <div class="card-header">
                    <h3 class="card-title card_title_center">اضافة</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.treasuries.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Left Side Inputs -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم الخزنة</label>
                                    <input name="name" id="name" class="form-control" style="width: 100%;"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label>اخر رقم ايصال صرف نقدي للخزنة</label>
                                    <input name="last_isal_exhcange" id="last_isal_exhcange" class="form-control"
                                        type="number" min="0" style="width: 100%;"
                                        value="{{ old('last_isal_exhcange') }}">
                                    @error('last_isal_exhcange')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Right Side Inputs -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نوع الخزنة</label>

                                    <select class="form-control" id="is_master" name="is_master"
                                        style="width: 100%;"value="{{ old('is_master') }}">
                                        <option value="">اختر النوع</option>

                                        <option @if (old('is_master') == 1) selected="selected" @endif value="1">
                                            رئيسية</option>
                                        <option @if (old('is_master') == 0) selected="selected" @endif value="0">
                                            فرعية</option>
                                    </select>

                                    @error('is_master')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label>اخر رقم ايصال تحصيل نقدي للخزنة</label>
                                    <input name="last_isal_collect" id="last_isal_collect" class="form-control"
                                        type="number" min="0" style="width: 100%;"
                                        value="{{ old('last_isal_collect') }}">
                                    @error('last_isal_collect')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Activation Status -->
                        <div class="form-group mt-3">
                            <label>حالة التفعيل</label>
                            <select class="form-control" id="active" name="active" style="width: 100%;">
                                <option value="">اختر الحالة</option>
                                <option @if (old('active') == 1) selected="selected" @endif value="1">مفعل
                                </option>
                                <option @if (old('active') == 0) selected="selected" @endif value="0">غير معفل
                                </option>
                            </select>
                            @error('active')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-5" style="width:250px">اضافة الخزنة</button>
                            <a href="{{ route('admin.treasuries.index') }}" class="btn btn-danger mt-5"
                                style="width:100px">الغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
