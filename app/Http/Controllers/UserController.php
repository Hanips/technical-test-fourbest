<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('users')
                    ->join('company', 'company.id', '=', 'users.company_id')
                    ->select('users.*', 'company.name as name', 'company.npwp as npwp')
                    ->orderBy('users.id', 'asc');

        $ar_user = $query->paginate(10);

        return view('user.index', compact('ar_user'));
    }
    
    public function create()
    {
        $roles = User::ROLES; 

        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try{
            DB::table('users')->insert(
            [
                'user_id'=>$request->user_id,
                'company_id'=>$request->company,
                'status'=>$request->status,
                'is_active'=>$request->is_active,
                'password'=>$request->password,
            ]);

            return redirect()->route('user.index')
                        ->with('success','Data User Baru Berhasil Disimpan');
        
        } catch (\Exception $e) {
            return redirect()->route('user.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = User::find($id);
        $roles = User::ROLES;
        
        return view('user.edit',compact('row', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::table('buku')->where('id',$id)->update(
            [
                'user_id'=>$request->user_id,
                'company_id'=>$request->company,
                'status'=>$request->status,
                'is_active'=>$request->is_active,
                'password'=>$request->password,
            ]);
           
            return redirect()->route('user.index')
                        ->with('success','Data User Berhasil Diubah');
        
        } catch (\Exception $e) {
            return redirect()->route('user.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
    
            return redirect()->route('user.index')
                        ->with('success', 'Data User Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('user.index')
                ->with('error', 'Terjadi Kesalahan Saat Hapus Data!');
        }
    }
    
}
