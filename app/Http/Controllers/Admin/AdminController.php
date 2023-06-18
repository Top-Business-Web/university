<?php
namespace App\Http\Controllers\Admin;

use App\Models\DataModification;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use mysql_xdevapi\ColumnResult;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{


    public function index(request $request)
    {

        if ($request->ajax()) {
            $admins = User::latest()->get();

            return Datatables::of($admins)
                ->addColumn('action', function ($admin) {
                    if ($admin->id == 1){
                        return '
                            <button type="button" data-id="' . $admin->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>

                       ';
                    } else {
                        return '
                            <button type="button" data-id="' . $admin->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $admin->id . '" data-title="' . $admin->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                    }

                })
                ->editColumn('image', function ($admin) {

                    if($admin->image != null){
                        return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' . asset("uploads/users/".$admin->image)  .'">
                    ';
                    }else{
                        return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' .  asset("uploads/users/default/avatar2.jfif") .'">
                    ';
                    }

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.admins.index');
        }
    }


    public function delete(Request $request)
    {
        $admin = User::query()
            ->where('id', $request->id)
            ->first();

        if($admin->image != null){

            if (file_exists(public_path("users/". $admin->image))) {
                unlink(public_path("users/". $admin->image));

                $admin->delete();
                return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);

            }else{
                return response(['message' => 'Error delete image user', 'status' => 500], 500);

            }//

        }else{

            $admin->delete();
            return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);
        }


    }


    public function create()
    {
        return view('admin.admins.parts.create');
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);


        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }


        $admin = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $profileImage ?? null,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        if($admin->save()){

            return response()->json(['status' => 200]);

        }else{

            return response()->json(['status' => 405]);
        }

    }

    public function edit(User $admin)
    {
        return view('admin.admins.parts.edit', compact('admin'));
    }



    public function update(Request $request): JsonResponse
    {


        $admin = User::query()
            ->findOrFail($request->id);

        $request->validate([
            'email' => 'required|unique:users,email,'. $request->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'nullable|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);

        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }


        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $request->image != null ? $profileImage : $admin->image,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($admin->save()){

            return response()->json(['status' => 200]);

        }else{

            return response()->json(['status' => 405]);
        }
    } // end update

    public function profile(Request $request)
    {
        $user = User::find(auth()->user()->id);

        return view('admin.admins.profile',compact('user'));
    }
}//end class
