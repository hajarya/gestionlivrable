<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Livrable;
use App\Models\Task;
use App\Models\Projet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ConsultantController extends Controller
{
public function dashboard()
{

$consultant = Auth::user();

$livrables = Livrable::where('consultant_id',$consultant->id)
            ->latest()
            ->get();

$totalLivrables = $livrables->count();

$inProgress = $livrables->where('status','In progress')->count();
$review = $livrables->where('status','In review')->count();
$completed = $livrables->where('status','Completed')->count();

$blocked = $livrables->where('status','Blocked')->count();

$inProgressPourcentage = $totalLivrables ? round(($inProgress/$totalLivrables)*100) : 0;
$reviewPourcentage = $totalLivrables ? round(($review/$totalLivrables)*100) : 0;
$completedPourcentage = $totalLivrables ? round(($completed/$totalLivrables)*100) : 0;

$tendanceTotal = "+".$totalLivrables;

/* ACTIVITE SEMAINE */

$jours = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
$semaine = [];

for ($i = 0; $i < 7; $i++) {
    $jour = now()->startOfWeek()->copy()->addDays($i);

    $count = $livrables->filter(function ($l) use ($jour) {
        return $l->created_at && \Carbon\Carbon::parse($l->created_at)->isSameDay($jour);
    })->count();

    $semaine[] = [
        'label' => $jours[$i],
        'count' => $count,
    ];
}

$totalActiviteSemaine = array_sum(array_column($semaine, 'count'));
$moyenneSemaine = round($totalActiviteSemaine / 7, 1);
$maxSemaine = max(array_column($semaine, 'count')) ?: 1;


/* ACTIVITE MOIS */

$mois=[];

for($i=29;$i>=0;$i--){

$date=Carbon::now()->subDays($i);

$count = Livrable::where('consultant_id',$consultant->id)
        ->whereDate('created_at',$date)
        ->count();

$mois[]=[
'date'=>$date,
'label'=>$date->format('d'),
'count'=>$count
];

}

$totalActiviteMois = array_sum(array_column($mois,'count'));
$moyenneMois = round($totalActiviteMois/30);


/* ACTIVITE ANNEE */

$annee=[];

for($i=11;$i>=0;$i--){

$date = Carbon::now()->subMonths($i);

$count = Livrable::where('consultant_id',$consultant->id)
        ->whereMonth('created_at',$date->month)
        ->whereYear('created_at',$date->year)
        ->count();

$annee[]=[
'date'=>$date,
'label'=>$date->format('M'),
'count'=>$count
];

}

$totalActiviteAnnee = array_sum(array_column($annee,'count'));
$moyenneAnnee = round($totalActiviteAnnee/12);


/* TACHES */

$taches = Task::where('consultant_id',$consultant->id)
        ->orderBy('echeance')
        ->get();

$tachesEnCours = $taches->where('terminee',false)->count();


/* LIVRABLES ECHEANCE */

$prochainsLivrables = Livrable::where('consultant_id',$consultant->id)
        ->whereDate('start_date','>=',now())
        ->orderBy('start_date')
        ->take(5)
        ->get();


/* PROJETS */

$livrables = Livrable::where('consultant_id', $consultant->id)->get();

return view('consultant.dashboard',[
'livrables'=>$livrables,
'totalLivrables'=>$totalLivrables,
'inProgress'=>$inProgress,
'review'=>$review,
'completed'=>$completed,
'inProgressPourcentage'=>$inProgressPourcentage,
'reviewPourcentage'=>$reviewPourcentage,
'completedPourcentage'=>$completedPourcentage,
'tendanceTotal'=>$tendanceTotal,

'semaine'=>$semaine,
'mois'=>$mois,
'annee'=>$annee,

'totalActiviteSemaine'=>$totalActiviteSemaine,
'totalActiviteMois'=>$totalActiviteMois,
'totalActiviteAnnee'=>$totalActiviteAnnee,

'moyenneSemaine'=>$moyenneSemaine,
'moyenneMois'=>$moyenneMois,
'moyenneAnnee'=>$moyenneAnnee,
'maxSemaine' => $maxSemaine,

'taches'=>$taches,
'tachesEnCours'=>$tachesEnCours,

'prochainsLivrables'=>$prochainsLivrables,

'projets'=>$livrables
]);


}




    public function livrables()
    {
        $consultant = Auth::user();

        $livrables = Livrable::where('consultant_id',$consultant->id)->get();

        return view('consultant.livrables',compact('livrables'));
    }


    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:not started,in progress,FQ review,completed,standby,cancelled'
    ]);

    $livrable = Livrable::findOrFail($id);

    // Vérifier si l'utilisateur est bien le consultant assigné
    if ($livrable->consultant_id != auth()->id()) {
        return back()->with('error', 'Vous n’êtes pas autorisé à modifier ce livrable.');
    }

    $livrable->status = $request->status;
    $livrable->save();

    return back()->with('success', 'Statut mis à jour avec succès.');
}


    public function comment(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|string|max:500'
    ]);

    $livrable = Livrable::findOrFail($id);

    $livrable->comments()->create([
        'user_id' => auth()->id(),
        'content' => $request->comment
    ]);

    return back()->with('success', 'Commentaire ajouté.');
}


    public function stats()
    {
        $consultant = Auth::user();

        $total = Livrable::where('consultant_id',$consultant->id)->count();

        $completed = Livrable::where('consultant_id',$consultant->id)
            ->where('status','completed')->count();

        return view('consultant.stats',compact('total','completed'));
    }

    public function taches()
{
    $consultant = Auth::user();

    $taches = Livrable::where('consultant_id',$consultant->id)->get();

    return view('consultant.taches',compact('taches'));
}

public function createLivrable()
{
    return view('consultant.create_livrable');
}

public function storeLivrable(Request $request)
{
    Livrable::create([
        'titre' => $request->titre,
        'description' => $request->description,
        'consultant_id' => Auth::id(),
        'status' => 'in_progress'
    ]);

    return redirect()->route('consultant.dashboard')
        ->with('success','Livrable créé avec succès');
}

public function equipe()
{
    return view('consultant.equipe');
}

public function calendrier()
{
    return view('consultant.calendrier');
}

public function statistiques()
{
    $livrables = \App\Models\Livrable::with(['tasks', 'comments', 'files'])
        ->where('consultant_id', auth()->id())
        ->get();

    $tasks = \App\Models\Task::whereHas('livrable', function ($query) {
        $query->where('consultant_id', auth()->id());
    })->get();

    $totalLivrables = $livrables->count();
    $notStarted = $livrables->where('status', 'not started')->count();
    $inProgress = $livrables->where('status', 'in progress')->count();
    $fqReview = $livrables->where('status', 'FQ review')->count();
    $completed = $livrables->where('status', 'completed')->count();
    $standby = $livrables->where('status', 'standby')->count();
    $cancelled = $livrables->where('status', 'cancelled')->count();

    $completedTasks = $tasks->filter(function ($task) {
        return $task->status === 'completed';
    })->count();

    $pendingTasks = $tasks->filter(function ($task) {
        return $task->status !== 'completed' || is_null($task->status);
    })->count();

    $totalTasks = $tasks->count();

    return view('consultant.statistiques', compact(
        'livrables',
        'tasks',
        'totalLivrables',
        'notStarted',
        'inProgress',
        'fqReview',
        'completed',
        'standby',
        'cancelled',
        'completedTasks',
        'pendingTasks',
        'totalTasks'
    ));
}
}