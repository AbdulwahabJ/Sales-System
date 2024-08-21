@extends('layouts.admin')

@section('title')
    بيانات الخزن
@endsection

@section('contentHeader')
    الخزن
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.treasuries.index') }}" class="a">
        الخزن</a>
@endsection

@section('contentHeaderActive')
    عرض
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات الخزن</h3>
                    <a href="{{ route('admin.treasuries.create') }}" class="btn btn-sm btn-success">اضافة خزنة</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (isset($data) && !empty($data))
                        @php
                            $i = 1;
                        @endphp
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="custom_thead">
                                <th>التسلسل</th>
                                <th>اسم الخزنة</th>
                                <th>رئيسية / فرعية</th>
                                <th> اخر ايصال صرف</th>
                                <th> اخر ايصال تحصيل</th>
                                <th>حالة التفعيل</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->name }}</td>
                                        <td>
                                            @if ($info->is_master == 1)
                                                رئيسية
                                            @else
                                                فرعية
                                            @endif
                                        </td>

                                        <td>{{ $info->last_isal_exhcange }}</td>
                                        <td>{{ $info->last_isal_collect }}</td>
                                        <td>
                                            @if ($info->active == 1)
                                                مفعل
                                            @else
                                                غير مفعل
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.treasuries.edit', $info->id) }}"
                                                class="btn btn-warning">تعديل</a>
                                            <button class="btn btn-info" data-id="{{ $info->id }}">المزيد</button>
                                        </td>
                                        {{-- <td>
                                            @php
                                                $dt = new DateTime($info->created_at);
                                                $date = $dt->format('Y-m-d');
                                                $time = $dt->format('H:i');
                                                $newDateTime = date('A', strtotime($time));
                                                $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساءَ';
                                            @endphp
                                            {{ $date }}
                                            <br>
                                            {{ $time }}

                                            {{ $newDateTimeType }}
                                            <br>
                                            بواسطة
                                            {{ $info->added_by_admin->name }}
                                        </td> --}}
                                        {{-- <td>

                                            @if ($info->updated_by > 0 and $info->updated_by != null)
                                                @php
                                                    $dt = new DateTime($info->updated_at);
                                                    $date = $dt->format('Y-m-d');
                                                    $time = $dt->format('H:i');
                                                    $newDateTime = date('A', strtotime($time));
                                                    $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساءَ';
                                                @endphp
                                                {{ $date }}
                                                <br>
                                                {{ $time }}
                                                {{ $newDateTimeType }}
                                                <br>
                                                بواسطة
                                                {{ $info->updated_by_admin->name }}

                                                <a href="{{ route('admin.adminPanelSettings.edit') }}"
                                                    class="btn  btn-success">تعديل</a>
                                            @else
                                                لايوجد تحديث بعد
                                            @endif
                                        </td> --}}
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </tbody>


                        </table>
                        <br>
                        {{ $data->links() }}
                    @else
                        <div class="alert alert-info">لايوجد بيانات لعرضها</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
