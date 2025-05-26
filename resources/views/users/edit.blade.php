@extends('layouts.AdminDash')

@section('title','Ligues')

@section('content')
<div class="pagetitle">
    <h1>Gestion de Ligues</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Ligues</a></li>
        <li class="breadcrumb-item active">all</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
      
    <div class="row">
        <div class="col-lg-6">
  
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Détails de l'utilisateur</h5>
              
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="AccountStatus" class="form-label">Statut :</label>
            <select name="AccountStatus" class="form-select" required>
                <option value="actif" {{ $user->AccountStatus === 'actif' ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ $user->AccountStatus === 'inactif' ? 'selected' : '' }}>Inactif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="UserType" class="form-label">Type d'utilisateur :</label>
            <select name="UserType" class="form-select">
                <option value="" {{ $user->UserType === null ? 'selected' : '' }}>Non défini</option>
                <option value="Admin" {{ $user->UserType === 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ $user->UserType === 'User' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
          </div>
  
        </div>
    </div>

 </section>
@endsection

