<?php

namespace App\Http\Controllers\Homepage;

use App\Model\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homepage.index');
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
//    dd($request->rate);
        if (Auth::guard('user')->check() != null) {

            $branch = Branch::findOrFail($id);
            $user = User::findOrFail(Auth::guard('user')->user()->id);
            $user->branchs()->syncWithoutDetaching([$branch->id => ['rate' => $request->rate]]);
        }
    }
}
