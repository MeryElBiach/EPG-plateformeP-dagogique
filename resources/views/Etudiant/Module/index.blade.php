@extends('Etudiant.layout')

@section('title', 'Mes modules')

@section('content')
<div class="page-content">
  <div class="container-fluid">

    {{-- Titre + formation --}}
    <div class="row mb-4">
      <div class="col-12 d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-0">📘 Mes modules</h4>
        <span class="text-muted">Formation : <strong>{{ $formation->nom }}</strong></span>
      </div>
    </div>

    {{-- Accordéon des modules --}}
    <div class="accordion" id="modulesAccordion">
      @forelse($modules as $module)
        <div class="accordion-item mb-3 shadow-sm">
          <h2 class="accordion-header" id="heading{{ $module->id }}">
            <button class="accordion-button collapsed bg-light" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $module->id }}"
                    aria-expanded="false"
                    aria-controls="collapse{{ $module->id }}">
              <div class="me-auto text-start">
                <h5 class="mb-1 fw-semibold">{{ $module->nom }}</h5>
                <small class="text-muted">
                  Enseignant : <strong>
                    {{ $module->enseignant->prenom ?? '-' }}
                    {{ $module->enseignant->nom ?? '' }}
                  </strong>
                  &bull; {{ $module->supports->count() }} ressources
                </small>
              </div>
            </button>
          </h2>
          <div id="collapse{{ $module->id }}"
               class="accordion-collapse collapse"
               aria-labelledby="heading{{ $module->id }}"
               data-bs-parent="#modulesAccordion">
            <div class="accordion-body p-0">
              @if($module->supports->isNotEmpty())
                <ul class="list-group list-group-flush">
                  @foreach($module->supports as $support)
                    @php
                      $typeKey   = strtolower($support->type);
                      // Classe de badge selon le type
                      $badgeClass = match($typeKey) {
                        'cours'    => 'bg-primary text-white',
                        'td'       => 'bg-success text-white',
                        'solution' => 'bg-warning text-dark',
                        default    => 'bg-secondary text-white'
                      };
                    @endphp
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>
                        <span class="fw-medium">{{ $support->titre }}</span>
                        <span class="badge {{ $badgeClass }} ms-2 text-uppercase small">
                          {{ ucfirst($typeKey) }}
                        </span>
                      </div>
                      <a href=""
                         class="btn btn-sm btn-view">
                        Voir
                      </a>
                    </li>
                  @endforeach
                </ul>
              @else
                <p class="text-muted text-center my-3">Aucun support disponible pour ce module.</p>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="alert alert-warning text-center">
          Aucun module disponible pour votre formation.
        </div>
      @endforelse
    </div>

  </div>
</div>
@endsection

@push('styles')
<style>
  .accordion-item {
    border-radius: 8px;
    overflow: hidden;
  }
  .accordion-button {
    font-size: 1rem;
    font-weight: 600;
  }
  .fw-medium, .fw-semibold {
    font-weight: 500;
  }
  /* Bouton “Voir” : fond bleu ciel pour tous les types */
  .btn-view {
    background-color: #05b1faff;
    color: #f7f9fbff;
    border: 1px solid #a0d9ff;
    transition: background-color 0.2s, filter 0.2s;
  }
  .btn-view:hover {
    filter: brightness(110%);
  }
</style>
@endpush
