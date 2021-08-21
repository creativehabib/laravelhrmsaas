<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Reply;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\Admin\NuData\StoreRequest;
use App\Http\Requests\Admin\NuData\UpdateRequest;
use App\Models\Nudata;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
Use Carbon\Carbon;



class NudataController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'National University';
        $this->nuDataOpen = 'active open';
        $this->nuDataActive = 'active';

        $this->middleware(function ($request, $next) {
            if (admin()->type != 'admin') {
                echo View::make('admin.errors.noaccess', $this->data);
                die();
            }
            return $next($request);
        });
    }

    public function index()
    {

        return View::make('admin.nu_data.index', $this->data);
    }

    // DATA TABLE ajax request
    public function ajaxNuDatas()
    {
        $result = Nudata::latest()->get();

        return DataTables::of($result)
            ->editColumn('created_at', function ($result) {
                return [
                    'display' => Carbon::parse($result->created_at)->format('d/m/Y | h:sa'),
                    'timestamp' => $result->created_at->timestamp
                ];
            })
            ->addIndexColumn()
            ->addColumn('edit', function ($row) {
            $string = '<a  data-toggle="modal" data-target=".show_notice" class="btn blue btn-sm" onclick="show_salary_slip(' . $row->id . ')" href="javascript:;" ><i class="fa fa-eye"></i> View</a>'.'<a  class="btn purple btn-sm"  href="javascript:;" onclick="showEdit(' . $row->id . ');return false;" ><i class="fa fa-edit fa-fw"></i> <span class="hidden-sm hidden-xs">' . trans('core.edit') . '</span></a>' .
                '<a class="btn red btn-sm" href="javascript:;" onclick="del(\'' .
                    $row->id . '\',\'' . addslashes($row->fileno) .
                    '\')"><i class="fa fa-trash fa-fw"></i><span class="hidden-sm hidden-xs"> ' .
                    trans("core.btnDelete") . '</span></a>';

            return $string;
        })
        ->rawColumns(['edit'])
        ->make();
    }

    public function create()
    {
        $this->nuData = new Nudata();

        return View::make('admin.nu_data.create', $this->data);
    }

    public function store(StoreRequest $request)
    {
        $nuData = new Nudata();

        $nuData->fileno = $request->fileno;
        $nuData->filename = $request->filename;
        $nuData->subject = $request->subject;
        $nuData->filecomedate = $request->filecomedate;
        $nuData->filecomefrom = $request->filecomefrom;
        $nuData->filemark = $request->filemark;
        $nuData->filego = $request->filego;
        $nuData->filegodate = $request->filegodate;
        $nuData->filelawgodate = $request->filelawgodate;
        $nuData->filelawcomedate = $request->filelawcomedate;
        $nuData->comments = $request->comments;
        $nuData->save();

        $output['msg'] = trans("messages.updateSuccess");

        return Reply::success(trans("messages.updateSuccess"));
    }

    public function edit($id)
    {
        //Check employee Company
        $this->faqCategory = Nudata::find($id);

        return View::make('admin.nu_data.edit', $this->data);
    }

    public function update(UpdateRequest $request, $id)
    {
        $nuData = Nudata::find($id);

        $nuData->fileno = $request->fileno;
        $nuData->filename = $request->filename;
        $nuData->subject = $request->subject;
        $nuData->filecomedate = $request->filecomedate;
        $nuData->filecomefrom = $request->filecomefrom;
        $nuData->filemark = $request->filemark;
        $nuData->filego = $request->filego;
        $nuData->filegodate = $request->filegodate;
        $nuData->filelawgodate = $request->filelawgodate;
        $nuData->filelawcomedate = $request->filelawcomedate;
        $nuData->comments = $request->comments;
        $nuData->save();

        $output['msg'] = trans("messages.updateSuccess");

        return Reply::success(trans("messages.updateSuccess"));
    }

    public function destroy($id)
    {
        Nudata::where('id', $id)
            ->delete();

        $output['success'] = 'deleted';

        return Response::json($output, 200);
    }

    public function pdf(){
        return 'Download';
    }

    public function show_data($id)
    {

        $this->nudata = Nudata::findOrFail($id);
        //var_dump($this->data);
        return View::make('admin.nu_data.pdfview', $this->data);
    }

}
