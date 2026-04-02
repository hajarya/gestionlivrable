<?php

namespace App\Http\Controllers;
use App\Models\User; // ⚡ ça importe le modèle User correctement
use App\Models\Livrable; // si tu utilises aussi Livrable
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     public function dashboard() {
        return view('admin.dashboard');
    }

    public function users() {
        $users = User::all(); // maintenant PHP sait que c’est le modèle
        return view('admin.users', compact('users'));
    }

    public function livrables() {
        $livrables = Livrable::all();
        return view('admin.livrables', compact('livrables'));
    }

    public function statistiques() {
        $livrables = Livrable::all();
        return view('admin.statistiques', compact('livrables'));
    }

    public function settings() {
        return view('admin.settings');
    }

    // Ajouter un utilisateur
    public function storeUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'role'       => 'required|in:admin,manager,consultant',
            'password'   => 'required|min:6',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'role'       => $request->role,
            'password'   => Hash::make($request->password),
            'is_active' => $request->is_active ?? true,
        ]);

        return response()->json(['success' => true, 'user' => $user]);
    }

    // Récupérer les données pour l'édition
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Mettre à jour un utilisateur
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'role'       => 'required|in:admin,manager,consultant',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->role       = $request->role;
        $user->is_active = $request->is_active ?? false;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['success' => true, 'user' => $user]);
    }

    // Supprimer un utilisateur
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }

    public function showUser($id)
{
    $user = User::findOrFail($id);
    return view('admin.user_show', compact('user'));
}

   public function destroyLivrable($id)
{
    $livrable = Livrable::findOrFail($id);
    $livrable->delete();

    return response()->json(['success' => true]);
}

public function updateGeneralSettings(Request $request)
{
    $request->validate([
        'app_name' => 'required|string|max:255',
        // ajoute d’autres validations si nécessaire
    ]);

    // Exemple : changer le nom de l’app dans .env (optionnel)
    // ou sauvegarder dans une table `settings`
    // Ici juste un retour simple
    return redirect()->route('admin.settings')->with('success', 'Paramètres mis à jour !');
}

public function updateStatuses(Request $request)
{
    $request->validate([
        'status_completed' => 'required|string|max:255',
        'status_in_progress' => 'required|string|max:255',
        'status_fq_review' => 'required|string|max:255',
        'status_not_started' => 'required|string|max:255',
        'status_standby' => 'required|string|max:255',
        'status_cancelled' => 'required|string|max:255',
    ]);

    // Exemple : sauvegarder dans une table settings ou config (à adapter)
    // Setting::updateOrCreate([...]);

    return redirect()->route('admin.settings')->with('success', 'Statuts mis à jour !');
}

public function updateTypes(Request $request)
{
    $request->validate([
        'type_tender' => 'required|string|max:255',
        'type_report' => 'required|string|max:255',
        'type_invoice' => 'required|string|max:255',
        // Ajoute tous les autres types selon ton Blade
    ]);

    // Exemple : sauvegarder dans ta table settings ou config
    // Setting::updateOrCreate([...]);

    return redirect()->route('admin.settings')->with('success', 'Types mis à jour !');
}
}
