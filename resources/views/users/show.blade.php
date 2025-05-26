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
              
                    <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email :</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Statut :</strong> {{ ucfirst($user->AccountStatus) }}</p>
                <p class="card-text"><strong>Type d'utilisateur :</strong> {{ $user->UserType ?? 'Non défini' }}</p>
                <p class="card-text"><strong>Inscrit le :</strong> {{ $user->created_at->format('d/m/Y') }}</p>
                <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
            </div>
                </div>
          </div>
  
        </div>
    </div>

 </section>
@endsection
