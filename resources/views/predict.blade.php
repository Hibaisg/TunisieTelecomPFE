@extends('layouts.AdminDash')

@section('title','Ligues')

@section('content')
<div class="pagetitle">
    <h1>Prediction de Churn</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('predict') }}">Prediction</a></li>
        <li class="breadcrumb-item active">Churn</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
      
    <div class="row">
        <div class="col-lg-12">
  
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Importer un fichier CSV pour la prédiction du risque de churn</h5>
              @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('predict') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="file" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Choisir un fichier CSV</label>
                    <input type="file" name="file" id="file" accept=".csv"
                    class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md px-3 py-2 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" style="background-color: rgb(0, 142, 207); color: white; padding: 10px 20px; border-radius: 5px;"> Prédire </button>

                </div>
            </form>
            </div>
          </div>
  
        </div>

  </section>
@endsection
