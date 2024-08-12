<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminPanelSetting;
use App\Models\Admin;


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
                $data->updated_by_admin = Admin::select('name')->where('id', $data->updated_by)->first();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
