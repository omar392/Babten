<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBanner;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blogs-read')->only(['index']);
        $this->middleware('permission:blogs-create')->only(['create', 'store']);
        $this->middleware('permission:blogs-update')->only(['edit', 'update']);
        $this->middleware('permission:blogs-delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($query) {
                    return '
                    <div align="center">
                    <img src="/dashboard/blogs/' . $query->image . '" border="0" style=" width: 150px; height: 90px;border-radius: 35px;" class="image-show" />
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

                ->addColumn('action', function($row){
                    if (Auth::guard('admin')->user()->hasPermission('blogs-update')){
                    $Btn = '<a href="' .route("blog.edit", $row->id). '"><button type="button"
                    class="edit btn btn-success fa fa-edit" data-size="sm" title="Edit"></button></a> &nbsp';
                    }
                    if (Auth::guard('admin')->user()->hasPermission('blogs-delete')){
                    $Btn = $Btn.'<form class="delete"  action="' . route("blog.destroy", $row->id) . '"  method="POST" id="sa-params"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="delete btn btn-danger fa fa-trash" title=" ' . 'Delete' . ' "></button>
                        </form>';
                    }
                    return $Btn;
                })
                ->rawColumns(['action','active','image'])
                ->make(true);
        }
        return view('admin.blogs.index');
    }

    public function blogStatus(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $blog->active = $request->active;
        $blog->save();
        return response()->json(['status' => 'success', 'data' => $blog]);
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
            'title_ar' => 'required|string' ,
            'title_en'=>'required|string',
            'url'=>'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

            $validator = Validator::make($request->all()  ,$rules );

            if ($validator->fails())
            {
                return response()->json(['status'=>'fails','errors'=>$validator->errors()->all()]);
            }

            $input = $request->all();
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'dashboard/blogs/';
            $profileImage = date('YmdHis') . "." . $image->hashName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Blog::create($input);
        return response()->json(['status'=>'success','data'=>$input]);
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
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit',compact('blog'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBanner $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update([
                'title_ar'       => $request->input('title_ar'),
                'title_en'       => $request->input('title_en'),
                'url'       => $request->input('url'),
                'description_ar'       => $request->input('description_ar'),
                'description_en'       => $request->input('description_en'),
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard/blogs/');
            $file->move($destinationPath, $filename);
            $blog['image'] = $filename;
        }
        $blog->save();
        return response()->json(['status'=>'success','data'=>$blog]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json(['status'=>'success']);
    }
}
