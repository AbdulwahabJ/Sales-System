<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Treasuries;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Treasuries\StoreTreasuryRequest;


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
        $if_is_master_exist = Treasuries::where('is_master', 1)->exists();
        return view('admin.treasuries.create', ['if_there_master' => $if_is_master_exist]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTreasuryRequest $request)
    {
        // dd($request->name);
        if ($request->is_master == 1 && Treasuries::where('is_master', 1)->exists()) {
            return redirect()->back()->with(['error' => 'لا يمكن انشاء اكثر من خزنة رئيسية'])->withInput();
        }
        DB::beginTransaction();
        try {
            Treasuries::create([
                'name' => $request->name,
                'is_master' => $request->is_master,
                'last_isal_exhcange' => $request->last_isal_exhcange,
                'last_isal_collect' => $request->last_isal_collect,
                'active' => $request->active,
                'added_by' => auth()->user()->id,
                'com_code' => auth()->user()->com_code,
                'date' => now(),
            ]);
            DB::commit();
            return redirect()->route('admin.treasuries.index')->with('success', 'تم اضافة الخزنة بنجاح');
        } catch (\Exception $e) {
            // dd($e);
            DB::rollBack();
            return redirect()->route('admin.treasuries.index')->withErrors(['error' => 'حدث خطأ اثناء انشاء الخزنة: ' . $e->getMessage()]);
        }
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
        $data = Treasuries::find($id);
        $if_treasury_master = $data->is_master == 1;

        $if_there_master = Treasuries::where('is_master', 1)->exists();

        return view('admin.treasuries.edit', ['data' => $data, 'if_treasury_master' => $if_treasury_master, 'if_there_master' => $if_there_master]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTreasuryRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $treasury = Treasuries::findOrFail($id);

                $treasury->update([
                    'name' => $request->name,
                    'is_master' => $request->is_master,
                    'last_isal_exhcange' => $request->last_isal_exhcange,
                    'last_isal_collect' => $request->last_isal_collect,
                    'active' => $request->active,
                    'com_code' => auth()->user()->com_code,
                    'date' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => auth()->user()->id,
                ]);
            });

            // إعادة توجيه المستخدم مع رسالة نجاح
            return redirect()->route('admin.treasuries.index')->with('success', 'تم تحديث الخزنة بنجاح');
        } catch (Exception $e) {
            return redirect()->route('admin.treasuries.index')->withErrors(['error' => 'حدث خطأ اثناء تعديل الخزنة' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ajax_search(Request $request)
    {
        if ($request->ajax()) {
            $search_by_text = $request->search_by_text;
            $data = Treasuries::where('name', 'LIKE', "%{$search_by_text}%")
                ->orderBy('id', 'DESC')
                ->paginate(PAGINATION_COUNT);

            return response()->json([
                'data' => view('admin.treasuries.ajax_search', compact('data'))->render()
            ]);
        }
    }
}
