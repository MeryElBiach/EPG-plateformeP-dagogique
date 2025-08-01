@extends('Admin.layout')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Titre + bouton retour -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="ri-edit-box-line"></i> Modifier le module</h4>
            <a href="{{ route('admin.modules.index') }}" class="btn btn-sm btn-secondary">
                <i class="ri-arrow-go-back-line"></i> Retour
            </a>
        </div>

        <!-- Formulaire -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.modules.update', $module) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nom -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du module</label>
                        <input type="text" name="nom" id="nom" class="form-control" 
                               value="{{ old('nom', $module->nom) }}" required>
                    </div>

                    <!-- Formation liée -->
                    <div class="mb-3">
                        <label for="formation_id" class="form-label">Formation</label>
                        <select name="formation_id" id="formation_id" class="form-select" required>
                            <option value="">-- Choisir une formation --</option>
                            @foreach($formations as $formation)
                                <option value="{{ $formation->id }}" 
                                    {{ $module->formation_id == $formation->id ? 'selected' : '' }}>
                                    {{ $formation->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Éléments du module -->
                    <div class="mb-3">
                        <label for="elements" class="form-label">Éléments du module</label>
                        <textarea name="elements" id="elements" rows="4" class="form-control"
                            placeholder="- Élément 1&#10;- Élément 2"
                        >{{ old('elements', $module->elements) }}</textarea>
                        <small class="text-muted">Séparer les éléments par des tirets (-)</small>
                    </div>

                    <!-- Bouton -->
                    <div class="text-end">
                        <button type="submit" class="btn text-white"
                            style="background: linear-gradient(90deg, #1d3557 0%, #457b9d 100%);">
                            <i class="ri-save-line"></i> Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
