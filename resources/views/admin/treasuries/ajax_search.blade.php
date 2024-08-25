<div id="ajax_responce_searchDiv">
    @if (isset($data) && $data->count() > 0)
        @php
            $i = 1;
        @endphp
        <table id="example2" class="table table-bordered table-hover">
            <thead class="custom_thead">
                <tr>
                    <th>التسلسل</th>
                    <th>اسم الخزنة</th>
                    <th>رئيسية / فرعية</th>
                    <th>أخر إيصال صرف</th>
                    <th>أخر إيصال تحصيل</th>
                    <th>حالة التفعيل</th>
                    <th></th>
                </tr>
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
                            <a href="{{ route('admin.treasuries.edit', $info->id) }}" class="btn btn-warning">تعديل</a>
                            <button class="btn btn-info" data-id="{{ $info->id }}">المزيد</button>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12" id="ajax_pagination_in_search"> {{ $data->links() }}</div>
    @else
        <div class="alert alert-info">لا يوجد بيانات لعرضها</div>
    @endif
</div>
