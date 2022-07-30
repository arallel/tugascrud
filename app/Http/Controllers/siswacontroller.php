<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class siswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        $siswasnotif = Siswa::onlyTrashed()->count();
        return view('index',[
        'siswas' => $siswas,
        'siswasnotif' => $siswasnotif,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = DB::table('siswas')->latest('id')->first();
        return view('create',compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'nis'  => 'required|unique:siswas',
           'nama' => 'required',
           'kelas' => 'required',
           'jurusan' => 'required',
        ]);    
        Siswa::create([
          'nis'  => $request->nis,
           'nama' => $request->nama,
           'kelas' => $request->kelas,
           'jurusan' => $request->jurusan,
        ]);

          toast('Your Data as been submited!','success');

        return redirect()->route('siswa.index');
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
        $siswa = Siswa::findOrFail($id);
        return view('edit', compact('siswa'));
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
        $siswa = Siswa::findOrFail($id);
        $siswa->update([
          'nis'  => $request->nis,
           'nama' => $request->nama,
           'kelas' => $request->kelas,
           'jurusan' => $request->jurusan,
        ]);
        toast('Your Data as been updated!','success');
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         Siswa::find($id)->delete();
         toast('Your Data as been Deleted!','success');
        return redirect()->route('siswa.index');
    }
    public function trash()
     {
        // mengampil data guru yang sudah dihapus
        $siswas = Siswa::onlyTrashed()->get();
        return view('trash',compact('siswas'));
    }
    public function restore($id)
    {
        $siswas = Siswa::onlyTrashed()->where('id',$id);
        $siswas->restore();
        toast('Your Data has been restore','success');
        return redirect('trash');
    }
    public function restoreall()
    {
            
        $siswas = Siswa::onlyTrashed();
        $siswas->restore();
        toast('Your Data has been restore','success');
        return redirect('trash');
    }
    public function permanentdestroy($id)
    {
        $siswas = Siswa::onlyTrashed()->where('id',$id);
        $siswas->forceDelete();
          toast('Your Data as been Deleted!','success');
        return redirect('trash');
    }
    public function permanentdestroyall()
    {
        // hapus permanen data guru
        $siswas = Siswa::onlyTrashed();
        $siswas->forceDelete();
        toast('Your Data as been Deleted!','success');
 
        return redirect('trash');
    }
}
