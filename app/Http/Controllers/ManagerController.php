<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livrable; // Assure-toi que ce modèle existe
use App\Models\User;

class ManagerController extends Controller
{
    // Dashboard
    public function dashboard()
{
      // Tous les livrables
    $totalLivrables = Livrable::count();

    // Consultants (supposé role = consultant)
    $consultants = User::where('role', 'consultant')
                        ->with('livrables') // relation
                        ->get();

    $totalConsultants = $consultants->count();

    // Stats livrables
    $totalInProgress = Livrable::where('status', 'in progress')->count();
    $totalCompleted = Livrable::where('status', 'completed')->count();

    return view('manager.dashboard', compact(
        'totalLivrables',
        'totalConsultants',
        'totalInProgress',
        'totalCompleted',
        'consultants'
    ));
}

    // Tous les livrables
    public function livrables()
    {
        $livrables = Livrable::all(); // récupère tous les livrables
        return view('manager.livrables', compact('livrables')); 
        // Assure-toi que resources/views/manager/livrables.blade.php existe
    }

    // Statistiques (si tu veux)
    public function statistiques()
{
    $livrables = Livrable::all(); // ⚡ IMPORTANT

    return view('manager.statistiques', compact('livrables'));
}
   public function details($id)
{
    $consultant = \App\Models\User::find($id);

    if (!$consultant) {
        abort(404);
    }

    $livrables = \App\Models\Livrable::where('consultant_id', $id)->get();

    return view('manager.consultant.details', compact('consultant', 'livrables'));
}
public function livrableDetails($id) {
    $livrable = \App\Models\Livrable::with([
        'tasks',    // ⚡ assure-toi de charger la relation
        'files',
        'comments',
        'consultant',
        'responsable'
    ])->findOrFail($id);

    return view('manager.livrable.details', compact('livrable'));
}

public function addComment(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|string|max:255',
    ]);

    \App\Models\Comment::create([
        'livrable_id' => $id,
        'user_id' => auth()->id(),
        'comment' => $request->comment,
    ]);
    
    return back()->with('success', 'Commentaire ajouté');
}



}