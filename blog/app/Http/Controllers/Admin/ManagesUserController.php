<?php

namespace App\Http\Controllers\Admin;

use App\Model\QuestionRecommender;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ManagesUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'User page';
        if (isset($request->search_content)) {
            $users = User::where('name', 'LIKE', "%$request->search_name%")->get();
        } else {
            $users = User::all();
        }
        $data = [
            'users' => $users,
            'title' => $title
        ];
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create User';
        $questions = QuestionRecommender::all();
        $data = [
            'title' => $title,
            'questions' => $questions
        ];
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $questionRSs = QuestionRecommender::all();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        foreach ($questionRSs as $questionRS) {
            if (isset($request->question[$questionRS->id])) {
                if ($request->question[$questionRS->id] == 'a') {
                    $user->questionRecommenders()->syncWithoutDetaching([$questionRS->id => ['answer' => 'a']]);
                } else {
                    $user->questionRecommenders()->syncWithoutDetaching([$questionRS->id => ['answer' => 'b']]);
                }
            } else {
                $user->questionRecommenders()->syncWithoutDetaching([$questionRS->id => ['answer' => 'no answer']]);
            }
        }
        return redirect()->route('admin.user.index');
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
        $user = User::findOrFail($id);
        $title = 'Edit user ' . $user->name;
        $questions = QuestionRecommender::all();
        $data = [
            'user' => $user,
            'title' => $title,
            'questions' => $questions
        ];
        return view('admin.user.edit', $data);
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
        dd($request->all());
        $user = User::findOrFail($id);
        $questionRSs = QuestionRecommender::all();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->password != $request->password) {
            $user->password = bcrypt($request->password);
        } else {
            $user->password = $request->password;
        }
        $user->save();
        foreach ($questionRSs as $questionRS) {
            if (isset($request->question[$questionRS->id])) {
                if ($request->question[$questionRS->id] == 'a') {
                    $user->questionRecommenders()->syncWithoutDetaching([$questionRS->id => ['answer' => 'a']]);
                } else {
                    $user->questionRecommenders()->syncWithoutDetaching([$questionRS->id => ['answer' => 'b']]);
                }
            } else {
                $user->questionRecommenders()->syncWithoutDetaching([$questionRS->id => ['answer' => 'no answer']]);
            }
        }
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = 'User';
        $user = User::findOrFail($id);
        DB::beginTransaction();
        try {
            $user->delete();
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
