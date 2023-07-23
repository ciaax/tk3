<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Item; 
use Illuminate\Support\Facades\Storage;//add Student Model - Data is coming from the database via Model.
 
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view ('items.index')->with('items', $items);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input      = $request->all();
        $file       = $request->file('gambar');
        $filename   = str_replace(" ", "_", $request->post('nama')) . '-' . md5(date('Y-m-d H:i:s')) . '.' . $file->extension();

        $path = 'public/images';
        $path = $file->storeAs($path, $filename);

        if (!$path) {
            echo "error upload";
            exit;
        }

        $item_data = array(
            "nama"          => $input['nama'],
            'deskripsi'     => $input['deskripsi'],
            'jenis'         => $input['jenis'],
            'stok'          => $input['stok'],
            'hargabeli'     => $input['hargabeli'],
            'hargajual'     => $input['hargajual'],
            'img_path'      => $path
        );

        Item::create($item_data);
        return redirect('item')->with('status', 'Item Addedd!');  
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $item->img_path = Storage::url($item->img_path);
        return view('items.show')->with('items', $item);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $item->img_path = Storage::url($item->img_path);

        return view('items.edit')->with('items', $item);
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
        $item   = Item::find($id);
        $input  = $request->all();

        $file   = $request->file('gambar');
        $path   = $item->img_path;
        if (isset($file)) {
            $filename   = str_replace(" ", "_", $request->post('nama')) . '-' . md5(date('Y-m-d H:i:s')) . '.' . $file->extension();

            $path = 'public/images';
            $path = $file->storeAs($path, $filename);

            if (!$path) {
                echo "error upload";
                exit;
            }
        }

        $item_data = array(
            "nama"          => $input['nama'],
            'deskripsi'     => $input['deskripsi'],
            'jenis'         => $input['jenis'],
            'stok'          => $input['stok'],
            'hargabeli'     => $input['hargabeli'],
            'hargajual'     => $input['hargajual'],
            'img_path'      => $path
        );

        $item->update($item_data);
        return redirect('item')->with('status', 'Item Updated!');  
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);
        return redirect('item')->with('status', 'Item deleted!');  
    }
}