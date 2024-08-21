@extends('layouts.admin')

@section('title')
    تعديل الخزن
@endsection

@section('contentHeader')
    تعديل
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.adminPanelSettings.index') }}" class="a">الخزن</a>
@endsection

@section('contentHeaderActive')
    تعديل
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mx-auto">
                <div class="card-header">
                    <h3 class="card-title card_title_center">اضافة</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.treasuries.update', $data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Left Side Inputs -->
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>اسم الخزنة</label>
                                    <input name="name" id="name" class="form-control" style="width: 100%;"
                                        value="@if (isset($_POST['name'])) {{ old('name') }}@else{{ $data->name }} @endif">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label>اخر رقم ايصال صرف نقدي للخزنة</label>
                                    <input name="last_isal_exhcange" id="last_isal_exhcange" class="form-control"
                                        type="text" min="0" style="width: 100%;"
                                        value="@if (isset($_POST['last_isal_exhcange'])) {{ old('last_isal_exhcange') }}@else{{ $data->last_isal_exhcange }} @endif">
                                    @error('last_isal_exhcange')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Side Inputs -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نوع الخزنة</label>

                                    @if ($if_there_master)
                                        @if ($if_treasury_master)
                                            <select class="form-control" id="is_master" name="is_master"
                                                style="width: 100%;"value="{{ old('is_master') }}">
                                                <option value="">اختر النوع</option>

                                                <option
                                                    @if (isset($_POST['is_master'])) @if (old('is_master') == 1) selected="selected" @endif
                                                @else @if ($data->is_master == 1) selected="selected" @endif
                                                    @endif

                                                    value="1">
                                                    رئيسية</option>
                                                <option
                                                    @if (isset($_POST['is_master'])) @if (old('is_master') == 0) selected="selected" @endif
                                                @else @if ($data->is_master == 0) selected="selected" @endif
                                                    @endif
                                                    value="0">
                                                    فرعية</option>
                                            </select>
                                        @else
                                            <select class="form-control" id="is_master" name="is_master"
                                                style="width: 100%;"value="{{ old('is_master') }}">
                                                <option
                                                    @if (isset($_POST['is_master'])) @if (old('is_master') == 0) selected="selected" @endif
                                                @else @if ($data->is_master == 0) selected="selected" @endif
                                                    @endif
                                                    value="0">
                                                    فرعية</option>
                                            </select>
                                        @endif
                                    @endif


                                    @error('is_master')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label>اخر رقم ايصال تحصيل نقدي للخزنة</label>
                                    <input name="last_isal_collect" id="last_isal_collect" class="form-control"
                                        type="text" min="0" style="width: 100%;"
                                        value="@if (isset($_POST['last_isal_collect'])) {{ old('last_isal_collect') }}@else{{ $data->last_isal_collect }} @endif">
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
                                <option
                                    @if (isset($_POST['active'])) @if (old('active') == 1) selected="selected" @endif
                                @else @if ($data->active == 1) selected="selected" @endif @endif
                                    value="1">مفعل
                                </option>
                                <option
                                    @if (isset($_POST['active'])) @if (old('active') == 0) selected="selected" @endif
                                @else @if ($data->active == 0) selected="selected" @endif @endif value="0">غير معفل
                                </option>
                            </select>
                            @error('active')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-5" style="width:250px">حفظ التعديلات</button>
                            <a href="{{ route('admin.treasuries.index') }}" class="btn btn-danger mt-5"
                                style="width:100px">الغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
