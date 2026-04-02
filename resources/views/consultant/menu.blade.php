<nav class="bg-blue-600 p-4 text-white flex gap-6">

<a href="{{ route('consultant.dashboard') }}">Dashboard</a>

<a href="{{ route('consultant.livrables') }}">Mes livrables</a>

<a href="{{ route('consultant.stats') }}">Statistiques</a>

<form method="POST" action="{{ route('logout') }}">
@csrf
<button>Logout</button>
</form>

</nav>