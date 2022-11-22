<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFile;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:files-read')->only(['index']);
        $this->middleware('permission:files-create')->only(['create', 'store']);
        $this->middleware('permission:files-update')->only(['edit', 'update']);
        $this->middleware('permission:files-delete')->only(['destroy']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = File::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('file', function ($query) {
                    return '
                    <div align="center">
                    <a href="/dashboard/files/' . $query->file . '" download>download</a>
                    </div>
                    ';
                })
                ->editColumn('active', function ($query) {
                    if ($query->active) {
                        $btn = '
                        <div class="container">
                        <label class="switch">
                          <input type="checkbox" data-id="' . $query->id . '" type="checkbox" id="check"  checked>
                          <div class="slider round"></div>
                        </label>
                      </div>
                      ';
                    } else {
                        $btn = '
                        <div class="container">
                        <label class="switch">
                          <input type="checkbox" data-id="' . $query->id . '" type="checkbox" id="check">
                          <div class="slider round"></div>
                        </label>
                      </div>
                      ';
                    }
                    return $btn;
                })

                ->addColumn('action', function ($row) {
                    if (Auth::guard('admin')->user()->hasPermission('files-update')) {
                        $Btn = '<a href="' . route("files.edit", $row->id) . '"><button type="button"
                    class="edit btn btn-success fa fa-edit" data-size="sm" title="Edit"></button></a> &nbsp';
                    }
                    if (Auth::guard('admin')->user()->hasPermission('files-delete')) {
                        $Btn = $Btn . '<form class="delete"  action="' . route("files.destroy", $row->id) . '"  method="POST" id="sa-params"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="delete btn btn-danger fa fa-trash" title=" ' . 'Delete' . ' "></button>
                        </form>';
                    }
                    return $Btn;
                })
                ->rawColumns(['action', 'active', 'file'])
                ->make(true);
        }
        return view('admin.files.index');
    }

    public function filesStatus(Request $request)
    {
        $file = File::find($request->file_id);
        $file->active = $request->active;
        $file->save();
        return response()->json(['status' => 'success', 'data' => $file]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'file' => 'required|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'fails', 'errors' => $validator->errors()->all()]);
        }

        $input = $request->all();
        if ($file = $request->file('file')) {
            $destinationPath = 'dashboard/files/';
            $profileImage = date('YmdHis') . "." . $file->hashName();
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }
        File::create($input);
        return response()->json(['status' => 'success', 'data' => $input]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::findOrFail($id);
        return view('admin.files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFile $request, $id)
    {
        $partner = File::findOrFail($id);
        $partner->update([
            'name_ar'       => $request->input('name_ar'),
            'name_en'       => $request->input('name_en'),
        ]);
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard/files/');
            $file->move($destinationPath, $filename);
            $partner['file'] = $filename;
        }
        $partner->save();
        return response()->json(['status' => 'success', 'data' => $partner]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();
        return response()->json(['status' => 'success']);
    }
}