@extends('Admin.layout')
@section('content')
<div class="page-content">
  <div class="container-fluid">
    <!-- start page title -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Dashboard Admin</h4>
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="#">EPG</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end page title -->
    <!-- KPI CARDS : Avancement et indicateurs clés -->
    <div class="row gx-3 mb-4">
      {{-- Étudiants actifs aujourd'hui --}}
      <div class="col-xl-3 col-md-6">
        <div class="card h-100">
          <div class="card-body d-flex align-items-center">
            <div class="flex-grow-1">
              <p class="text-muted mb-1">👨‍🎓 Actifs aujourd’hui</p>
              <h3 class="mb-1">{{ $activeToday ?? 42 }}</h3>
              <small class="text-success">+ {{ $pctActive ?? 12 }}% vs hier</small>
              <div id="sparkline-students" class="apex-charts mt-2" data-series="[5,8,6,9,12,10,{{ $activeToday ?? 42 }}]"></div>
            </div>
            <div class="avatar-sm ms-3">
              <span class="avatar-title bg-light text-secondary rounded-3">
                <i class="ri-team-line font-size-24"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      {{-- Supports déposés ce mois --}}
      <div class="col-xl-3 col-md-6">
        <div class="card h-100">
          <div class="card-body d-flex align-items-center">
            <div class="flex-grow-1">
              <p class="text-muted mb-1">📁 Supports ce mois</p>
              <h3 class="mb-1">{{ $supportsThisMonth ?? 128 }}</h3>
              <small class="text-danger">– {{ $pctSupports ?? 8 }}% vs mois dernier</small>
              <div id="sparkline-supports" class="apex-charts mt-2" data-series="[10,15,12,20,25,22,{{ $supportsThisMonth ?? 128 }}]"></div>
            </div>
            <div class="avatar-sm ms-3">
              <span class="avatar-title bg-light text-warning rounded-3">
                <i class="ri-folder-2-line font-size-24"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      {{-- Moyenne des évaluations --}}
      <div class="col-xl-3 col-md-6">
        <div class="card h-100">
          <div class="card-body d-flex align-items-center">
            <div class="flex-grow-1">
              <p class="text-muted mb-1">⭐ Note moyenne</p>
              <h3 class="mb-1">{{ $avgRating ?? 4.3 }}/5</h3>
              <small class="text-success">+ {{ $pctRating ?? 4 }}% vs sem. passée</small>
              <div id="sparkline-rating" class="apex-charts mt-2" data-series="[3.5,3.8,4.0,4.2,4.1,4.3,{{ $avgRating ?? 4.3 }}]"></div>
            </div>
            <div class="avatar-sm ms-3">
              <span class="avatar-title bg-light text-info rounded-3">
                <i class="ri-star-line font-size-24"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      {{-- Taux de complétion global --}}
      <div class="col-xl-3 col-md-6">
        <div class="card h-100">
          <div class="card-body d-flex align-items-center">
            <div class="flex-grow-1">
              <p class="text-muted mb-1">✅ Complétion globale</p>
              <h3 class="mb-1">{{ $globalCompletion ?? 76 }}%</h3>
              <small class="text-success">+ {{ $pctCompletion ?? 5 }}% vs dernier mois</small>
              <div class="progress mt-2" style="height:6px;">
                <div class="progress-bar bg-success" style="width: {{ $globalCompletion ?? 76 }}%;"></div>
              </div>
            </div>
            <div class="avatar-sm ms-3">
              <span class="avatar-title bg-light text-success rounded-3">
                <i class="ri-checkbox-circle-line font-size-24"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end KPI CARDS -->

    {{-- Ici tu pourras ajouter tes graphiques, tableaux, etc. --}}
    <div class="row">
      <!-- … -->
    </div>
     <div class="row gx-3">

      <!-- Derniers supports déposés -->
      <div class="col-xl-8 col-md-12 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title mb-3">📥 Derniers supports déposés</h5>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead class="table-light">
                  <tr>
                    <th>Module</th>
                    <th>Type</th>
                    <th>Enseignant</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Programmation Web</td>
                    <td>Cours</td>
                    <td>Mme. Khadija</td>
                    <td>18/07/2025</td>
                  </tr>
                  <tr>
                    <td>CyberSécurité</td>
                    <td>TD</td>
                    <td>Mr. Ahmed</td>
                    <td>17/07/2025</td>
                  </tr>
                  <tr>
                    <td>Base de Données</td>
                    <td>Solution TD</td>
                    <td>Mme. Leila</td>
                    <td>16/07/2025</td>
                  </tr>
                  <tr>
                    <td>Angular Avancé</td>
                    <td>Support</td>
                    <td>Mr. Saïd</td>
                    <td>15/07/2025</td>
                  </tr>
                  <tr>
                    <td>Laravel 9</td>
                    <td>Cours</td>
                    <td>Mme. Fatima</td>
                    <td>14/07/2025</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Activité récente -->
      <div class="col-xl-4 col-md-12 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title mb-3">💬 Activité récente</h5>
            <ul class="list-unstyled mb-0">
              <li class="d-flex align-items-start pb-2 border-bottom">
                <i class="ri-chat-1-line me-2 text-primary"></i>
                <div>
                  <strong>Samir</strong> a commenté "Cours JS"  
                  <br><small class="text-muted">il y a 2h</small>
                </div>
              </li>
              <li class="d-flex align-items-start py-2 border-bottom">
                <i class="ri-upload-2-line me-2 text-success"></i>
                <div>
                  <strong>Mme. Leila</strong> a ajouté un TD  
                  <br><small class="text-muted">hier à 16:30</small>
                </div>
              </li>
              <li class="d-flex align-items-start py-2 border-bottom">
                <i class="ri-delete-bin-line me-2 text-danger"></i>
                <div>
                  <strong>Mr. Ahmed</strong> a supprimé un support  
                  <br><small class="text-muted">2 jours</small>
                </div>
              </li>
              <li class="d-flex align-items-start pt-2">
                <i class="ri-star-line me-2 text-warning"></i>
                <div>
                  <strong>Salma</strong> a évalué "Module Réseaux"  
                  <br><small class="text-muted">3 jours</small>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Exemple d'initialisation des sparklines (ApexCharts)
    ['students','supports','rating'].forEach(id => {
      const el = document.getElementById(`sparkline-${id}`);
      ApexCharts.init({
        chart:{type:'area',sparkline:{enabled:true},height:60},
        stroke:{width:2},
        series:[{data: JSON.parse(el.dataset.series)}],
        tooltip:{fixed:{enabled:false},x:{show:false},y:{formatter:(v)=>v},marker:{show:false}}
      }, `#sparkline-${id}`);
    });
  });
</script>
@endpush
