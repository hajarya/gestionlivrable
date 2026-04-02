<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livrable;
use App\Models\Task;
use App\Models\LivrableFile;
use App\Models\User;

class ResponsableController extends Controller
{
    // Dashboard responsable
    public function dashboard()
{
    $livrables = auth()->user()->livrablesResponsable()->get();

    return view('responsable.dashboard', compact('livrables'));
}

    // Liste des livrables du responsable
    public function index()
    {
        $livrables = auth()->user()->livrablesResponsable()->with('consultant')->get();
        return view('responsable.livrables.index', compact('livrables'));
    }

    // Formulaire création d’un livrable
    public function create()
    {
        $consultants = User::where('role','consultant')->get();
        $types = ['CBC', 'DTRF', 'TENDER', 'STANDARD'];
        $tasks = [
            'Reparation et clean up de document',
            'Import sous DOORS',
            'Creation de baseline',
            'Saisie des ecarts',
            'Remplissage de CBC',
            'Quality check'
        ];

        return view('responsable.livrables.create', compact('consultants','types','tasks'));
    }

    // Enregistrer le livrable
    public function store(Request $request)
    {
        $request->validate([
            'titre'=>'required|string',
            'type'=>'required|string',
            'consultant_id'=>'required|exists:users,id',
            'start_date'=>'required|date',
            'duration'=>'required|integer',
            'tasks'=>'required|array',
            'files.*'=>'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png'
        ]);

        // Création du livrable
        $livrable = Livrable::create([
            'titre'=>$request->titre,
            'type'=>$request->type,
            'responsable_id'=>auth()->id(),
            'consultant_id'=>$request->consultant_id,
            'start_date'=>$request->start_date,
            'duration'=>$request->duration,
            'status'=>'pending'
        ]);

        // Création des tâches
        foreach($request->tasks as $t){
            Task::create([
                'livrable_id'=>$livrable->id,
                'nom'=>$t,
                'status'=>'pending',
                'consultant_id' => $request->consultant_id
            ]);
        }

        // Upload des fichiers
        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                $path = $file->store('livrables_files','public');
                LivrableFile::create([
                    'livrable_id'=>$livrable->id,
                    'file_path'=>$path
                ]);
            }
        }

        return redirect()->route('responsable.livrables')->with('success','Livrable créé avec succès');
    }

    // Voir le détail d’un livrable
    public function show($id)
    {
        $livrable = Livrable::with('tasks','files','consultant')->findOrFail($id);
        return view('responsable.livrables.show', compact('livrable'));
        
    }

    public function edit($id)
{
    $livrable = \App\Models\Livrable::findOrFail($id);

    $consultants = User::where('role', 'consultant')->get();

    $types = ['CBC','DTRF','TENDER','STANDARD'];

    $tasks = [
        'Reparation et clean up de document',
        'Import sous DOORS',
        'Creation de baseline',
        'Saisie des ecarts',
        'Remplissage de CBC',
        'Quality check'
    ];

    return view('responsable.livrables.edit', compact(
        'livrable',
        'consultants',
        'types',
        'tasks'
    ));
}

public function update(Request $request, $id)
{    

    $request->validate([
    'status' => 'required|string'
    ]);
    $livrable = Livrable::findOrFail($id);

    $livrable->type = $request->type;
    $livrable->consultant_id = $request->consultant_id;

    $livrable->status = $request->status ?? 'Not Started';
    $livrable->start_date = $request->start_date;
    $livrable->duration = $request->duration;

    $livrable->save();

    return redirect()->route('responsable.livrables')
           ->with('success','Livrable modifié avec succès');
}

public function destroy($id)
{
    $livrable = Livrable::findOrFail($id);
    $livrable->delete();

    return redirect()->route('responsable.livrables')
        ->with('success','Livrable supprimé avec succès');
}

public function download($id)
{
    $livrable = Livrable::findOrFail($id);
    $filePath = storage_path('app/public/' . $livrable->document_path);
    
    if (file_exists($filePath)) {
        return response()->download($filePath);
    }
    
    return back()->with('error', 'Fichier non trouvé');
}


public function statistiques()
{
    $userId = auth()->id();

    // récupérer tous les livrables du responsable
    $livrables = Livrable::where('responsable_id', $userId)->get();

    // total
    $totalLivrables = $livrables->count();

    // compter par statut
    $completed = $livrables->where('status', 'completed')->count();
$cancelled = $livrables->where('status', 'cancelled')->count();
$inProgress = $livrables->where('status', 'in progress')->count();
$fqReview = $livrables->where('status', 'fq review')->count();
$standby = $livrables->where('status', 'standby')->count();

    // livrables ouverts et fermés
    $openLivrables = $inProgress + $fqReview + $standby;
    $closedLivrables = $completed + $cancelled;

    // taux
    $tauxCompletion = $totalLivrables > 0 ? round(($completed/$totalLivrables)*100,1) : 0;
    $tauxAnnulation = $totalLivrables > 0 ? round(($cancelled/$totalLivrables)*100,1) : 0;
    $tauxEnCours = $totalLivrables > 0 ? round(($openLivrables/$totalLivrables)*100,1) : 0;

    // graphique annuel
    $months = ['Jan','Fev','Mar','Avr','Mai','Juin','Juil','Aout','Sep','Oct','Nov','Dec'];

    $openData = [];
    $closedData = [];

    foreach(range(1,12) as $month){

        $openData[] = Livrable::where('responsable_id',$userId)
            ->whereMonth('created_at',$month)
            ->whereIn('status',['in progress','fq review','standby'])
            ->count();

        $closedData[] = Livrable::where('responsable_id',$userId)
            ->whereMonth('created_at',$month)
            ->whereIn('status',['completed','cancelled'])
            ->count();
    }
     
    return view('responsable.statistiques', compact(
        'livrables',
        'totalLivrables',
        'completed',
        'cancelled',
        'inProgress',
        'fqReview',
        'standby',
        'openLivrables',
        'closedLivrables',
        'tauxCompletion',
        'tauxAnnulation',
        'tauxEnCours',
        'months',
        'openData',
        'closedData'
    ));
}
}