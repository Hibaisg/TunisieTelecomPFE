
@extends('layouts.AdminDash')

@section('title','Users')

@section('content')
<div class="pagetitle">
    <h1>Gestion des utilisateurs</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Users</a></li>
        <li class="breadcrumb-item active">New</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
      
    <div class="row">
        <div class="col-lg-12">
  
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">créer utilisateur</h5>
                <form action="{{ route('users.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="AccountStatus" class="form-label">Statut :</label>
            <select name="AccountStatus" class="form-select" required>
                <option value="actif" {{ old('AccountStatus') == 'actif' ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ old('AccountStatus') == 'inactif' ? 'selected' : '' }}>Inactif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="UserType" class="form-label">Type d'utilisateur :</label>
            <select name="UserType" class="form-select">
                <option value="" {{ old('UserType') == '' ? 'selected' : '' }}>Non défini</option>
                <option value="Admin" {{ old('UserType') == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ old('UserType') == 'User' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmation du mot de passe :</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>

            </div>
          </div>
  
        </div>
    </div>

 </section>
@endsection
