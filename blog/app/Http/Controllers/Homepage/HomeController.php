<?php

namespace App\Http\Controllers\Homepage;

use App\Model\Branch;
use App\Model\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = Branch::limit(3)->get();;
        $data = [
            'branchs' => $branchs
        ];
        return view('homepage.index', $data);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detailBranch($id)
    {
        $branch = Branch::findOrFail($id);
        $data = [
            'branch' => $branch
        ];
        return view('homepage.detail-branch', $data);
    }

    public function listBranch()
    {
        $branchs = Branch::paginate(4);
        $data = [
            'title' => 'DANH SÁCH CÁC NGÀNH',
            'branchs' => $branchs
        ];
        return view('homepage.list-branch', $data);
    }

    public function postRate(Request $request, $id)
    {
        if (Auth::guard('user')->check() != null) {

            $branch = Branch::findOrFail($id);
            $user = User::findOrFail(Auth::guard('user')->user()->id);
            $user->branchs()->syncWithoutDetaching([$branch->id => ['rate' => $request->rate]]);
        }
    }

    public function report(Request $request)
    {
        if (Auth::guard('user')->check() != null) {
            $userId = Auth::guard('user')->user()->id;
        } else {
            $userId = "";
        }
        DB::beginTransaction();
        try {
            Report::create([
                'user_id' => $userId,
                'content' => $request->content,
                'status' => false
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => 'success',
            ], $e->getCode());
        }
        return response()->json([
            'status' => true,
            'message' => 'success',
        ], self::CODE_CREATE_SUCCESS);
    }
}
