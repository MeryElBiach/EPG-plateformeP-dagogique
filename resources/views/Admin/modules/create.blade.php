@extends('Admin.layout')

@section('content')
<style>
    /* Dégradé “EPG” réutilisable */
    .epg-gradient-header {
        background: linear-gradient(90deg, #1d3557 0%, #457b9d 75%, #e76f00 100%);
        color: #fff;
    }
    /* Encadrement inputs + focus bleu clair */
    .form-control, .form-select {
        border-radius: .5rem;
        border: 1px solid #cbd5e1;
    }
    .form-control:focus, .form-select:focus {
        border-color: #457b9d;
        box-shadow: 0 0 0 .15rem rgba(69,123,157,.25);
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- Titre + retour -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 fw-bold">
                <i class="ri-layout-grid-line"></i>
                Ajouter un module
            </h4>

            <a href="{{ route('admin.modules.index') }}"
               class="btn btn-sm text-white"
               style="background:#1d3557">
                <i class="ri-arrow-go-back-line"></i> Retour
            </a>
        </div>

        <!-- CARTE Formulaire -->
        <div class="card shadow-sm">
            <div class="card-header epg-gradient-header rounded-top">
                <h6 class="mb-0">Informations du module</h6>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.modules.store') }}" method="POST">
                    @csrf

                    {{-- Nom --}}
                    <div class="mb-3">
                        <label for="nom" class="form-label fw-semibold">Nom du module</label>
                        <input type="text" name="nom" id="nom"
                               class="form-control" value="{{ old('nom') }}" required>
                    </div>

                    {{-- Formation --}}
                    <div class="mb-3">
                        <label for="formation_id" class="form-label fw-semibold">Formation</label>
                        <select name="formation_id" id="formation_id"
                                class="form-select" required>
                            <option value="">— Choisir une formation —</option>
                            @foreach($formations as $formation)
                                <option value="{{ $formation->id }}"
                                    {{ old('formation_id') == $formation->id ? 'selected' : '' }}>
                                    {{ $formation->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Enseignant responsable --}}
                    <div class="mb-3">
                        <label for="enseignant_id" class="form-label fw-semibold">
                            Enseignant responsable
                        </label>
                        <select name="enseignant_id" id="enseignant_id"
                                class="form-select">
                            <option value="">— À pourvoir —</option>
                            @foreach($enseignants as $prof)
                                <option value="{{ $prof->id }}"
                                    {{ old('enseignant_id') == $prof->id ? 'selected' : '' }}>
                                    {{ $prof->nom }} {{ $prof->prenom }} — {{ $prof->email }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Laisser vide si aucun responsable pour l’instant.</small>
                    </div>

                    {{-- Éléments --}}
                    <div class="mb-4">
                        <label for="elements" class="form-label fw-semibold">Éléments du module</label>
                        <textarea name="elements" id="elements" rows="4"
                                  class="form-control"
                                  placeholder="- Introduction…&#10;- Chapitre 1…">{{ old('elements') }}</textarea>
                        <small class="text-muted">Préfixe chaque ligne par <code>-</code>.</small>
                    </div>

                    {{-- Bouton --}}
                    <div class="text-end">
                        <button type="submit" class="btn text-white px-4 py-2"
                                style="background:linear-gradient(90deg,#1d3557 0%,#457b9d 60%,#e76f00 100%);">
                            <i class="ri-check-line"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
