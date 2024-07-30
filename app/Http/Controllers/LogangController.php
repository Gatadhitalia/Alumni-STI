<?php

namespace App\Http\Controllers;

use App\Models\Logang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogangController extends Controller{
    
    /**
     * Display a listing of the resource.
     */
    // public function index(){
    //     // Get selected filters
    //     $selectedPengalaman = request('Pengalaman', []);
    //     $selectedTipeMagang = request('TipeMagang', []);
    
    //     // Fetch logang based on selected filters
    //     $logang = Logang::latest()->filter(request(['Tags', 'search', 'Pengalaman', 'TipeMagang']))->paginate(6);
    
    //     // Determine the availability of each filter option
    //     $availablePengalaman = Logang::select('Pengalaman')
    //         ->distinct()
    //         ->whereIn('Pengalaman', [
    //             'Tanpa Pengalaman', 'Fresh Graduate', 'Minimal 1 Tahun',
    //             'Minimal 2 Tahun', 'Minimal 3 Tahun', 'Lebih dari 3 Tahun'
    //         ])
    //         ->pluck('Pengalaman')
    //         ->toArray();
    
    //     $availableTipeMagang = Logang::select('TipeMagang')
    //         ->distinct()
    //         ->whereIn('TipeMagang', [
    //             'Freelance', 'Full Time', 'Part Time', 'Kontrak', 'Sementara'
    //         ])
    //         ->pluck('TipeMagang')
    //         ->toArray();
    
    //     return view('alumni.logang.index', compact('logang', 'availablePengalaman', 'availableTipeMagang', 'selectedPengalaman', 'selectedTipeMagang'));
    // }
    public function index(Request $request)
    {
        $selectedPengalaman = $request->input('Pengalaman', []);
        $selectedTipeMagang = $request->input('TipeMagang', []);
        
        // Fetch filtered results based on selected checkboxes
        $logang = Logang::query();
    
        if (!empty($selectedPengalaman)) {
            $logang->whereIn('Pengalaman', $selectedPengalaman);
        }
    
        if (!empty($selectedTipeMagang)) {
            $logang->whereIn('TipeMagang', $selectedTipeMagang);
        }
    
        $logang = $logang->get();
    
        return view('alumni.logang.index', compact('logang', 'selectedPengalaman', 'selectedTipeMagang'));
    }
    

    // Show single listing
    public function show(Logang $id) {
        $logang = Logang::find($id);
        return view('alumni.logang.show', ['logang' => $id]);
    }
    public function showHome(Logang $id) {
        $listingmagang = Logang::find($id);
        return view('alumni.logang.showHome', ['listingmagang' => $id]);
    }

    // Show Create Form
    public function create() {
        return view('alumni.logang.create');
    }

    // Store Listing Data
    public function store(Request $request) {

        $image      =$request->file('logo');
        $filename   =date('Y-m-d').$image->getClientOriginalName();
        $path       ='/imglogo/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));
                  
        Logang::create([
            'NamaPerusahaan' => $request->NamaPerusahaan,
            'Posisi' => $request->Posisi,
            'Alamat' => $request->Alamat,
            'Pengalaman' => $request->Pengalaman,
            'Gaji' => $request->Gaji,
            'TipeMagang' => $request->TipeMagang,
            'Deskripsi' => $request->Deskripsi,
            'Website' => $request->Website,
            'Email' => $request->Email,
            'Tags' => $request->Tags,
            'Verify' => $request->Verify,
            'Logo' => $filename

        ]);

        return redirect('/logang')->with('message', 'Listing created successfully!');
    }

    public function edit(Request $request,$id) {
        $logang = Logang::find($id);
        return view('alumni.logang.edit', compact('logang', 'id'));
    }
    // public function show($id){
    //     $logang = Logang::find($id);
    //     return response()->json($logang);
    // }

    // public function edit($id){
    //     $logang = Logang::find($id);
    //     return response()->json($logang);
    // }
    
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id){

    //      if ($request->Logo) {
    //         $Logo      =$request->file('Logo');
    //         $filename   =date('Y-m-d').$Logo->getClientOriginalName();
    //         $path       ='/imglogo/'.$filename;

    //         Storage::disk('public')->put($path,file_get_contents($Logo));
    //     }
    //     Logang::whereId($id)->update([
    //         'NamaPerusahaan' => $request->NamaPerusahaan,
    //         'Posisi' => $request->Posisi,
    //         'Alamat' => $request->Alamat,
    //         'Pengalaman' => $request->Pengalaman,
    //         'Gaji' => $request->Gaji,
    //         'TipeMagang' => $request->TipeMagang,
    //         'Deskripsi' => $request->Deskripsi,
    //         'Website' => $request->Website,
    //         'Email' => $request->Email,
    //         'Tags' => $request->Tags,
    //         'Verify' => $request->Verify,
    //         'Logo' => $filename

    //     ]);

    //     return redirect()->route('logang.manage')->with('success', 'lowongan updated successfully');
    // }

    public function update(Request $request, $id){
        // Initialize the filename variable
        $filename = null;

        // Check if a new logo file is uploaded
        if ($request->hasFile('Logo')) {
            $Logo = $request->file('Logo');
            $filename = date('Y-m-d') . $Logo->getClientOriginalName();
            $path = '/imglogo/' . $filename;

            // Store the new logo file
            Storage::disk('public')->put($path, file_get_contents($Logo));
        } else {
            // Use the existing logo if no new file is uploaded
            $filename = $request->input('existingLogo');
        }

        // Update the record in the database
        Logang::whereId($id)->update([
            'NamaPerusahaan' => $request->NamaPerusahaan,
            'Posisi' => $request->Posisi,
            'Alamat' => $request->Alamat,
            'Pengalaman' => $request->Pengalaman,
            'Gaji' => $request->Gaji,
            'TipeMagang' => $request->TipeMagang,
            'Deskripsi' => $request->Deskripsi,
            'Website' => $request->Website,
            'Email' => $request->Email,
            'Tags' => $request->Tags,
            'Verify' => $request->Verify,
            'Logo' => $filename
        ]);

        // Redirect back with a success message
        return redirect()->route('logang.manage')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $logang = Logang::find($id);
        if ($logang){
            $logang->delete();
        }
        return redirect()->route('logang.manage')->with('success', 'Lowongan deleted successfully');
    }

    // Manage logang
    // public function manage() {
    //     return view('alumni.logang.manage', ['logang' =>Logang::all()]);
    // }
    public function manage(Request $request){
        $query = Logang::query();

        if ($request->has('NamaPerusahaan') && !empty($request->NamaPerusahaan)) {
            $query->where('NamaPerusahaan', 'LIKE', '%' . $request->NamaPerusahaan . '%');
        }

        $logang = $query->get();
        return view('alumni.logang.manage', compact('logang'));
    }
}
