<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\FileInfo;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserFileImport;
use App\Models\FileInfoHasGroup;
use App\Models\FileGroupInfo;

class UserController extends Controller
{


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, user $user)
    {
        $data = [];
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'confirmed',
        ]);

        $data['name']             = $request->input('name');
        $data['email']            = $request->input('email');
        $data['password']         = $request->input('password') == null ? $user->password : Hash::make($request->input('password'));

        $user->update($data);
        Session::flash('message', 'User Update Successfully created!');
        Session::flash('class', 'success');
        return redirect()->route('admin.user.listView');
    }


    public function accountStatus($id)
    {
        $user = User::find($id);
        if ($user->account_status == 'active') {
            $user->account_status = 'block';
        } else {
            $user->account_status = 'active';
        }
        $user->save();
        return redirect()->route('admin.user.listView');
    }
    public function fileUploadIndex()
    {
        return view('user.file.index');
    }
    public function fileUpload(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_file' => 'required|mimes:xlsx,xls,csv',
        ]);
        if ($request->hasFile('user_file')) {
            $name = $request->input('name');
            $file = $request->file('user_file');
            $fileName = $file->getClientOriginalName();
            FileInfo::create([
                'name' => $name,
                'file_name' => $fileName,
                'total_upload' => 0,
                'total_process' => 0,
                'group' => 0,
            ]);
            Excel::import(new UserFileImport, $file);
        }
        Session::flash('message', 'File import successfully!');
        Session::flash('class', 'success');
        return back();
    }
    public function fileAndGroupInfo()
    {
        $fileInfos = FileInfo::all();
        return view('user.file.fileAndGroupInfo', compact('fileInfos'));
    }

    public function fileHasGroupInfo($id)
    {

        $fileInfoHasGroups = FileInfoHasGroup::select()
            ->where('file_info_id', $id)
            ->get();


        return response()->json([
            'status'   => true,
            'message'  => "data",
            'data'     => $fileInfoHasGroups
        ], 200);
    }

    public function fileGroupInfo($id)
    {
        $fileGroupInfos = FileGroupInfo::select()
            ->where('file_info_has_group_id', $id)
            ->get();
        return view('user.file.fileGroupInfo', compact('fileGroupInfos'));
    }

    public function destroy(user $user)
    {
        if ((int)$user->id !== (int) 1 && (int) $user->id !== (int) auth()->user()->id) {
            $user->delete();
            Session::flash('message', 'User Account Delete Successfully!');
            Session::flash('class', 'danger');
            return redirect()->route('admin.user.listView');
        } else {
            Session::flash('message', 'Sorry, You are unable to change the status!!!');
            Session::flash('class', 'danger');
            return redirect()->route('admin.user.listView');
        }
    }
}
