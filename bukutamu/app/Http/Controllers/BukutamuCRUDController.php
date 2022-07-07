<?php
namespace App\Http\Controllers;
use App\Models\Bukutamu;
use Illuminate\Http\Request;

class bukutamuCRUDController extends Controller
{

//  Display a listing of the resource.

//  @return \Illuminate\Http\Response

    public function index()
    {
        $data['bukutamus'] = Bukutamu::orderBy('nomor','asc')->paginate(5);
        return view('bukutamus.index', $data);
    }

//  Show the form for creating a new resource.

//  @return \Illuminate\Http\Response

    public function create()
    {
        return view('bukutamus.create');
    }

// Store a newly created resource in storage.

// @param  \Illuminate\Http\Request  $request
// @return \Illuminate\Http\Response

    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'email' => 'required',
        'waktu' => 'required',
        'komentar' => 'required'
        ]);
        $bukutamu = new Bukutamu;
        $bukutamu->nama = $request->nama;
        $bukutamu->email = $request->email;
        $bukutamu->waktu = $request->waktu;
        $bukutamu->komentar = $request->komentar;
        $bukutamu->save();
        return redirect()->route('bukutamus.index')
        ->with('success','Data tamu telah tersimpan.');
    }

// Display the specified resource.

// @param  \App\bukutamu  $bukutamu
// @return \Illuminate\Http\Response

    public function show(Bukutamu $bukutamu)
    {
        return view('bukutamus.show',compact('bukutamu'));
    } 

// Show the form for editing the specified resource.

// @param  \App\Bukutamu  $bukutamu
// @return \Illuminate\Http\Response

    public function edit(Bukutamu $bukutamu)
    {
        return view('bukutamus.update',compact('bukutamu'));
    }

// Update the specified resource in storage.

// @param  \Illuminate\Http\Request  $request
// @param  \App\bukutamu  $bukutamu
// @return \Illuminate\Http\Response

    public function update(Request $request, $nomor)
    {
        $request->validate([
        'nama' => 'required',
        'email' => 'required',
        'komentar' => 'required'
        ]);
        $bukutamu = Bukutamu::find($nomor);
        $bukutamu->nama = $request->nama;
        $bukutamu->email = $request->email;
        $bukutamu->komentar = $request->komentar;
        $bukutamu->save();
        return redirect()->route('bukutamus.index')
        ->with('success','Data tamu telah diubah.');
    }

// Remove the specified resource from storage.

// @param  \App\Bukutamu  $bukutamu
// @return \Illuminate\Http\Response

    public function destroy(Bukutamu $bukutamu)
    {
        $bukutamu->delete();
        return redirect()->route('bukutamus.index')
        ->with('success','Data tamu telah dihapus.');
    }
}