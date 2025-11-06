<nav class="navbar navbar-light bg-light shadow-sm px-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="mb-0">Tableau de bord</h4>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm"> Déconnexion</button>
    </form>
</nav>
