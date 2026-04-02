<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LivrableFile;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Livrable;

class LivrableController extends Controller
{
    public function updateStatus(Request $request,$id)
{

$livrable = Livrable::findOrFail($id);

$livrable->statut = $request->statut;

$livrable->save();

return back()->with('success','Statut mis à jour');

}

public function downloadFile($id)
{
    $file = LivrableFile::findOrFail($id);

    if (!Storage::disk('public')->exists($file->file_path)) {
        abort(404, "Fichier non trouvé !");
    }

    return Storage::disk('public')->download($file->file_path);
}

public function uploadFile(Request $request, $livrableId)
{
    $request->validate([
        'document' => 'required|file|max:10240', // max 10 Mo
    ]);

    $path = $request->file('document')->store('livrables_files', 'public');

    LivrableFile::create([
        'livrable_id' => $livrableId,
        'file_path' => $path
    ]);

    return back()->with('success', 'Fichier uploadé avec succès !');
}


public function store(Request $request)
{
    // Validation de base
    $request->validate([
        'titre' => 'required|string|max:255',
        'type' => 'required|string|in:CBC,DTRF,TENDER,STANDARD',
        'responsable_id' => 'required|exists:users,id',
        'consultant_id' => 'required|exists:users,id',
        'start_date' => 'required|date',
        'duration' => 'required|integer|min:1',
        'date_fin_prevue' => 'nullable|date',
        'status' => 'nullable|string|in:pending,in_progress,completed,standby,cancelled',

    ]);

    // Si la date de fin n'est pas fournie, calculer à partir de la date de début + durée estimée
$dateFin = $request->date_fin_prevue 
    ? \Carbon\Carbon::parse($request->date_fin_prevue) 
    : \Carbon\Carbon::parse($request->start_date)->addDays($request->duration);

$livrable = Livrable::create([
    'titre' => $request->titre,
    'type' => $request->type,
    'responsable_id' => $request->responsable_id,
    'consultant_id' => $request->consultant_id,
    'start_date' => $request->start_date,
    'duration' => $request->duration,
    'date_fin_prevue' => $dateFin->format('Y-m-d'),
    'status' => $request->status ?? 'pending',
]);
    return redirect()->route('livrables.index')->with('success', 'Livrable créé avec succès !');
}


}


