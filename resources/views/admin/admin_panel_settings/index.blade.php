@extends('layouts.admin')

@section('title')
    الضبط العام
@endsection

@section('contentHeader')
    الضبط
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.adminPanelSettings.index') }}" class="a">الضبط</a>
@endsection

@section('contentHeaderActive')
    عرض
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (isset($data) && !empty($data))
                        <table id="example2" class="table table-bordered table-hover">

                            <tr>
                                <td class="width30">اسم الشركة</td>
                                <td>{{ $data->system_name }}</td>
                            </tr>
                            <tr>
                                <td class="width30">كود الشركة</td>
                                <td>
                                    @if ($data->com_code == 1)
                                        مفعل
                                    @else
                                        معطل
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="width30">عنوان الشركة</td>
                                <td>{{ $data->address }}</td>
                            </tr>
                            <tr>
                                <td class="width30">هاتف الشركة</td>
                                <td>{{ $data->phone }}</td>
                            </tr>
                            <tr>
                                <td class="width30">رسالة التنبية اعلى الشاشة الشركة</td>
                                <td>{{ $data->general_alert }}</td>
                            </tr>
                            <tr>
                                <td class="width30">شعار الشركة</td>
                                <td>
                                    <div class="image">
                                        {{-- {{ dd($data->photo) }} --}}
                                        <img class="custom_img"
                                            src="{{ asset('assets/admin/uploads') . '/' . $data->photo }}"
                                            alt="لم يتم رفع الشعار بعد">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="width30"> تاريخ اخر تحديث</td>
                                <td>
                                    @if ($data->updated_by > 0 and $data->updated_by != null)
                                        @php
                                            $dt = new DateTime($data->updated_at);
                                            $date = $dt->format('Y-m-d');
                                            $time = $dt->format('H:i');
                                            $newDateTime = date('A', strtotime($time));
                                            $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساءَ';
                                        @endphp
                                        {{-- {{ dd($data) }} --}}
                                        {{ $date }}
                                        {{ $time }}
                                        {{ $newDateTimeType }}
                                        بواسطة
                                        {{ $data->updated_by_admin->name }}

                                        <a href="{{ route('admin.adminPanelSettings.edit') }}"
                                            class="btn  btn-success">تعديل</a>
                                    @endif
                                </td>
                            </tr>

                        </table>
                    @else
                        <div class="alert alert-info">لايوجد بيانات لعرضها</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
