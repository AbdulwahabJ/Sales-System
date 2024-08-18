<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Treasuries;
use App\Models\Admin;

use Illuminate\Http\Request;

class TreasuriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Treasuries::select()->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);

        if (!empty($data)) {
            foreach ($data as $info) {
                $info['added_by_admin'] = Admin::select('name')->where('id', $info->added_by)->first();
                //
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info['updated_by_admin'] = Admin::select('name')->where('id', $info->updated_by)->first();
                    // dd($data);
                }
            }
        }
        return view('admin.treasuries.index', ['data' => $data]);
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
