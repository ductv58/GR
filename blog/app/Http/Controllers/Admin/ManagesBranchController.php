<?php

namespace App\Http\Controllers\Admin;

use App\Model\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function React\Promise\reject;
use Illuminate\Support\Facades\DB;

class ManagesBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Branch page';
        if (isset($request->search_content)) {
            $branchs = Branch::where('content', 'LIKE', "%$request->search_content%")->get();
        } else {
            $branchs = Branch::all();
        }
        $data = [
            'branchs' => $branchs,
            'title' => $title
        ];
        return view('admin.branch.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Branch';
        return view('admin.branch.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->description = $request->description;
        $branch->link = $request->link;
        if ($request->file('avatar')) {
            $destinationPath = public_path() . '/images/';
            $filename = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move($destinationPath, $filename);
            $branch->avatar = $filename;
        }
        $branch->save();
        return redirect()->route('admin.branch.index')->with(['createSuccess' => 'A Branch is created!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd(1);
        $branch = Branch::findOrFail($id);
        $title = 'Edit branch ' . $branch->name;
        $data = [
            'branch' => $branch,
            'title' => $title,
        ];
//        dd(1);
        return view('admin.branch.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->name = $request->name;
        $branch->description = $request->description;
        $branch->link = $request->link;
        if ($request->file('avatar')) {
            $destinationPath = public_path() . '/images/';
            $filename = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move($destinationPath, $filename);
            $branch->avatar = $filename;
        }
        $branch->save();
        return redirect()->route('admin.branch.index')->with(['updateSuccess' => 'A Branch is updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = 'Branch';
        $branch = Branch::findOrFail($id);
        DB::beginTransaction();
        try {
            $branch->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => trans('messages.delete_success', ['title' => $title]),

            ], $e->getCode());
        }
        return response()->json([
            'status' => true,
            'message' => trans('messages.delete_success', ['title' => $title]),
        ], self::CODE_DELETE_SUCCESS);
    }
}
