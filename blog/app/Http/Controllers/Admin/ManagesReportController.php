<?php

namespace App\Http\Controllers\Admin;

use App\Model\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ManagesReportController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Report page';
        if (isset($request->status)) {
            $status = $request->status;
            if ($status != 'all') {
                $reports = Report::where('status', $status);
            } else {
                $reports = new Report();
            }
        } else {
            $reports = Report::where('status', '0');
        }
        if (isset($request->search_content)) {
            $reports = $reports->where('content', 'LIKE', "%$request->search_content%")->paginate(10);
        } else {
            $reports = $reports->paginate(10);
        }
        $data = [
            'reports' => $reports,
            'title' => $title,
            'status' => $request->status
        ];
        return view('admin.report.index', $data);
    }

    public function destroy($id)
    {
        $title = 'Report';
        $report = Report::findOrFail($id);
        DB::beginTransaction();
        try {
            $report->delete();
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

    public function actionReport(Request $request)
    {
        $id = $request->id;
        $action = $request->action;
        $report = Report::findOrFail($id);
        if ($action != Report::NOT_APPROVE && $action != Report::APPROVE) {
            return redirect()->route('admin.report.index');
        }
        $report->status = $action;
        $report->save();
        return back();
    }
}
