@extends('Admin.layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Titre + bouton retour -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="ri-layout-grid-line"></i> Ajouter un module</h4>
            <a href="{{ route('admin.modules.index') }}" class="btn btn-sm btn-secondary">
                <i class="ri-arrow-go-back-line"></i> Retour
            </a>
        </div>

        <!-- Formulaire -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.modules.store') }}" method="POST">
                    @csrf

                    <!-- Nom -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du module</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>

                    <!-- Formation liée -->
                    <div class="mb-3">
                        <label for="formation_id" class="form-label">Formation</label>
                        <select name="formation_id" id="formation_id" class="form-select" required>
                            <option value="">-- Choisir une formation --</option>
                            @foreach($formations as $formation)
                                <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Élément de module -->
                    <div class="mb-3">
                        <label for="elements" class="form-label">Éléments du module</label>
                        <textarea name="elements" id="elements" rows="4" class="form-control" placeholder="Ex : &#10;- Introduction à Java&#10;- Programmation orientée objet"></textarea>
                        <small class="text-muted">Séparer les éléments par des tirets (-)</small>
                    </div>

                    <!-- Bouton -->
                    <div class="text-end">
                        <button type="submit" class="btn text-white"
                            style="background: linear-gradient(90deg, #1d3557 0%, #457b9d 100%);">
                            <i class="ri-check-line"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
