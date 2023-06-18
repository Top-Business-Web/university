<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Selection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class SelectionController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View|JsonResponse
     * @throws \Exception
     * start index method
     */
    public function index(request $request)
    {
        if ($request->ajax()) {
            $selections = Selection::latest()->get();

            return Datatables::of($selections)
                ->addColumn('action', function ($select) {
                    return '
                            <button type="button" data-id="' . $select->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.selection.index');
        }
    }

    /**
     * @return Application|Factory|View
     * @Start create method
     */
    public function create()
    {
        return view('admin.selection.parts.create');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @start store method
     */
    public function store(Request $request): JsonResponse
    {

        $array = $request->details;

        foreach ($array as $key => $option){
            if ($option == null){
                unset($array[$key]);
            }
        }

        $request->validate([
            'name' => 'required',
            'details' => 'required|array|min:1',
        ]);

        $selection = Selection::create([
            'name' => $request->name,
            'details' => $array,
        ]);

        if ($selection->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }

    }

    /**
     * @param Selection $selection
     * @return Application|Factory|View
     * @start edit method
     */
    public function edit(Selection $selection)
    {
        return view('admin.selection.parts.edit', compact('selection'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @start update method
     */
    public function update(Request $request): JsonResponse
    {
        $selection = Selection::findOrFail($request->id);

        $request->validate([
            'name' => 'required',
            'details' => 'required|array',
        ]);

        $array = $request->details;

        foreach ($array as $key => $option){
            if ($option == null){
                unset($array[$key]);
            }
        }

        $selection->update([
            'name' => $request->name,
            'details' => $array,
        ]);

        if ($selection->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * start delete method
     */
    public function destroy(Request $request)
    {
        $selection = Selection::findOrFail($request->id);

        $selection->delete();
        return response(['message' => 'Selection Deleted Successfully', 'status' => 200], 200);
    }
}

//<button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
//                                    data-id="' . $select->id . '" data-title="' . $select->name . '">
//                                    <i class="fas fa-trash"></i>
//                            </button>
