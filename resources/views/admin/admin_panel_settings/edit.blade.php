@extends('layouts.admin')

@section('title')
    تعديل الضبط العام
@endsection

@section('contentHeader')
    الضبط
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.adminPanelSettings.index') }}" class="a">الضبط</a>
@endsection

@section('contentHeaderActive')
    تعديل
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">تعديل بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (isset($data) && !empty($data))
                        <form action="{{ route('admin.adminPanelSettings.update') }}"
                            method="post"enctype="multipart/form-data">@csrf

                            <div class="from-group">
                                <label>اسم الشركة</label>
                                <input name="system_name" id="system_name" class="form-control"
                                    value="{{ $data->system_name }}" placeholder="ادخل اسم الشركة">
                                @error('system_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="from-group mt-3">
                                <label>عنوان الشركة</label>
                                <input name="address" id="address" class="form-control" value="{{ $data->address }}"
                                    placeholder="ادخل عنوان الشركة">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="from-group mt-3">
                                <label>هاتف الشركة</label>
                                <input name="phone" id="phone" class="form-control" value="{{ $data->phone }}"
                                    placeholder="ادخل هاتف الشركة">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="from-group mt-3">
                                <label>رسالة تنبيه اعلى الشركة</label>
                                <input name="generla_alert" id="generla_alert" class="form-control"
                                    value="{{ $data->generla_alert }}" placeholder="">
                            </div>
                            <div class="from-group mt-3">
                                <label>شعار الشركة</label>
                                <div class="image">

                                    <img class="custom_img" src="{{ asset('assets/admin/uploads') . '/' . $data->photo }}"
                                        alt="لم يتم رفع الشعار بعد">
                                </div>
                                <button type="button" class="btn btn-info btn-sm " id="update_image"
                                    name="update_image">تغير
                                    صورة</button>
                                <div id="old_image"></div><br>
                                <button type="button" class="btn btn-danger btn-sm "style="display:none"
                                    id="cancel_update_image">الغاء</button>
                            </div>

                            <div class="form-group
                                    text-center">
                                <button type="submit" class="btn btn-primary mt-3"">حفظ
                                    التعديلات</button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info">لايوجد بيانات لعرضها</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
