@extends('Etudiant.layout')

@section('title', 'Tableau de bord')

@section('content')
<div class="page-content">
  <div class="container-fluid">

    {{-- ✅ Titre + breadcrumb --}}
    <div class="row mb-20">
      <div class="col-20">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0 fw-bold">ESPACE ÉTUDIANT</h4>
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="#">EPG</a></li>
              <li class="breadcrumb-item active">Mon espace</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    {{-- 🎓 Formation info --}}
    <div class="alert alert-light border d-flex align-items-center mb-10 rounded shadow-sm">
      <i class="ri-graduation-cap-line me-2 text-primary font-size-20"></i>
      <div>
        Formation actuelle : <strong>{{ $formation->nom }}</strong>
      </div>
    </div>

    {{-- 📊 Cartes indicateurs --}}
    <div class="row gx-3 mb-5">
      <div class="col-md-6 col-xl-3">
        <div class="card dashboard-card h-100 text-center">
          <div class="card-body">
            <i class="ri-book-open-line text-primary font-size-24 mb-2"></i>
            <h6 class="text-muted">Modules suivis</h6>
            <h3>{{ $modulesCount }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card dashboard-card h-100 text-center">
          <div class="card-body">
            <i class="ri-folder-2-line text-warning font-size-24 mb-2"></i>
            <h6 class="text-muted">Ressources</h6>
            <h3>{{ $supportsCount }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card dashboard-card h-100 text-center">
          <div class="card-body">
            <i class="ri-chat-3-line text-info font-size-24 mb-2"></i>
            <h6 class="text-muted">Commentaires</h6>
            <h3>{{ $commentsCount }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card dashboard-card h-100 text-center">
          <div class="card-body">
            <i class="ri-time-line text-success font-size-24 mb-2"></i>
            <h6 class="text-muted">Dernier support consulté</h6>
            @if(isset($lastViewedSupport))
              <p class="mb-0"><strong>{{ $lastViewedSupport->titre }}</strong></p>
              <small class="text-muted">{{ $lastViewedSupport->module->nom }} • {{ $lastViewedSupport->created_at->diffForHumans() }}</small>
            @else
              <p class="text-muted">Aucun support consulté récemment</p>
            @endif
          </div>
        </div>
      </div>
    </div>

    {{-- 📥 Derniers supports déposés --}}
    <div class="card shadow-sm mb-5">
      <div class="card-body">
        <h5 class="card-title mb-3">📂 Derniers supports ajoutés</h5>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>Module</th>
                <th>Type</th>
                <th>Titre</th>
                <th>Déposé le</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentSupports as $support)
              <tr>
                <td>{{ $support->module->nom }}</td>
                <td>{{ ucfirst($support->type) }}</td>
                <td>{{ $support->titre }}</td>
                <td>{{ \Carbon\Carbon::parse($support->created_at)->format('d/m/Y') }}</td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center text-muted">Aucun support trouvé</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- 🔗 Accès modules --}}
    <div class="text-center mb-10">
      <a href="#" class="btn btn-primary btn-lg shadow-sm px-4">
        📚 Accéder à mes modules
      </a>
    </div>

  </div>
</div>
@endsection

@push('styles')
<style>
  .dashboard-card {
    border-radius: 10px;
    transition: transform 0.2s ease, background-color 0.3s;
  }
  .dashboard-card:hover {
    transform: translateY(-3px);
    background-color: #f0f8ff; /* bleu ciel */
  }
</style>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Ajout d'effets si besoin à l’avenir
  });
</script>
@endpush
