
@extends('Admin.layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- En-tête -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="ri-graduation-cap-line"></i> Ajouter une formation</h4>
            <a href="{{ route('admin.formations.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="ri-arrow-go-back-line"></i> Retour
            </a>
        </div>

        <!-- Formulaire -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">📄 Nouveau formulaire</h5>

                <!-- Affichage des erreurs -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulaire -->
                <form action="{{ route('admin.formations.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de la formation</label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Ex: Technicien Supérieur" value="{{ old('nom') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Décrivez brièvement la formation..." required>{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="btn text-white" style="background: linear-gradient(90deg, #1d3557 0%, #457b9d 100%);">
                        <i class="ri-save-line"></i> Enregistrer
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
