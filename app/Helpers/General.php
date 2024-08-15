<?php

use Illuminate\Support\Facades\Config;


function uploadImage($folder, $image)
{
    // احصل على الامتداد الأصلي للملف مع تحويله إلى حروف صغيرة
    $extension = strtolower($image->getClientOriginalExtension());

    // قم بإنشاء اسم فريد للملف باستخدام الوقت الحالي ورقم عشوائي
    $filename = time() . rand(100, 999) . '.' . $extension;

    // انقل الملف إلى المجلد المحدد
    $image->move($folder, $filename);

    // ارجع اسم الملف ليتم استخدامه لاحقاً إذا لزم الأمر
    return $filename;
}
