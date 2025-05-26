
@extends('layouts.AdminDash')

@section('title','Utilisateurs')

@section('content')
<div class="pagetitle">
    <h1>Gestion des utilisateurs</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Users</a></li>
        <li class="breadcrumb-item active">all</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
      
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Liste des utilisateurs</h5>
                <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Ajouter un utilisateur</a>
                                  <!-- Table with stripped rows -->
              <table class="table table-modern table-striped table-hover table-bordered datatable">
<thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Statut</th>
                <th>Type d'utilisateur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if ($user->AccountStatus === 'actif')
        <span class="badge bg-success">Actif</span>
    @else
        <span class="badge bg-secondary">Inactif</span>
    @endif</td>
                    <td>{{ $user->UserType ?? '-' }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">Consulter</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir désactiver cet utilisateur ?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Désactiver</button>
</form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun utilisateur trouvé.</td>
                </tr>
            @endforelse
        </tbody>
              </table>
              <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
    </div>

  </section>
@endsection
