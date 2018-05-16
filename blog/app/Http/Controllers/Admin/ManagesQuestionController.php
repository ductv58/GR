<?php

namespace App\Http\Controllers\Admin;

use App\Model\QuestionRecommender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuestionRequest;
use Illuminate\Support\Facades\DB;

class ManagesQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Question page';
        if (isset($request->search_content)) {
            $questions = QuestionRecommender::where('content', 'LIKE', "%$request->search_content%")->get();
        } else {
            $questions = QuestionRecommender::all();
        }
        $data = [
            'questions' => $questions,
            'title' => $title
        ];
        return view('admin.question.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Question';
        return view('admin.question.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        $question = new QuestionRecommender();
        $question->content = $request->content;
        $question->answer_a = $request->answer_a;
        $question->answer_b = $request->answer_b;
        $question->save();
        return redirect()->route('admin.question.index')->with(['createSuccess' => trans('messages.create_course_success')]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = 'Question';
        $question = QuestionRecommender::findOrFail($id);
        DB::beginTransaction();
        try {
            $question->delete();
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
