<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminPanelSetting;
use App\Models\Admin;
use App\Http\Requests\AdminPanelSettingsRequest;

class AdminPanelSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AdminPanelSetting::where('com_code', auth()->user()->com_code)->first();
        if (!empty($data)) {
            if ($data->updated_by > 0 and $data->updated_by != null) {
                $data['updated_by_admin'] = Admin::select('name')->where('id', $data->updated_by)->first();
                // dd($data);
            }
        }
        // dd($data->updated_by_admin->name);
        return view('admin.admin_panel_settings.index', ['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $data = AdminPanelSetting::where('com_code', auth()->user()->com_code)->first();
        return view('admin.admin_panel_settings.edit', ['data' => $data]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPanelSettingsRequest $request)
    {
        // dd($request);
        try {
            $admin_panel_settings = AdminPanelSetting::where('com_code', auth()->user()->com_code)->first();
            $admin_panel_settings->system_name = $request->system_name;
            $admin_panel_settings->address = $request->address;
            $admin_panel_settings->phone = $request->phone;
            $admin_panel_settings->general_alert = $request->general_alert;
            $admin_panel_settings->updated_by = auth()->user()->id;
            $admin_panel_settings->updated_at = date("Y-m-d H:i:s");
            //
            if ($request->has('photo')) {
                $request->validate([
                    'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
                ]);
                $image_path = uploadImage('assets/admin/uploads', $request->photo,);
                $admin_panel_settings->photo = $image_path;
            }
            $admin_panel_settings->save();
            return redirect()->route('admin.adminPanelSettings.index')->with(['success', 'تم تحديث البيانات بنجاح']);

            //
        } catch (Exception $e) {
            return redirect()->route('admin.adminPanelSettings.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
