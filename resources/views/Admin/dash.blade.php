@extends("Admin.layout")
@section("content")
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">EPG</a></li>
                            <li class="breadcrumb-item active">Dashboard Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Formations</p>
                                <h4 class="mb-2">1</h4>
                                <p class="text-muted mb-0">Technicien Supérieur (ID: 4)</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-book-2-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                            
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Modules</p>
                                <h4 class="mb-2">12</h4>
                                <p class="text-muted mb-0">Modules rattachés à la formation</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="ri-layout-grid-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Enseignants</p>
                                <h4 class="mb-2">5</h4>
                                <p class="text-muted mb-0">Enseignants actifs</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-info rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Étudiants</p>
                                <h4 class="mb-2">98</h4>
                                <p class="text-muted mb-0">Inscrits dans la formation</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-warning rounded-3">
                                    <i class="ri-team-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Graphique des supports par module -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Supports déposés par module</h4>
                <div id="bar_chart_modules" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>

    <!-- Courbe des dépôts par mois -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Évolution des dépôts (mois)</h4>
                <div id="line_chart_depots" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
</div>

<!-- Derniers supports déposés -->
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Derniers supports déposés</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Module</th>
                                <th>Type</th>
                                <th>Enseignant</th>
                                <th>Date de dépôt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mathématiques 1</td>
                                <td>TD</td>
                                <td>Mr. Karim</td>
                                <td>17/07/2025</td>
                            </tr>
                            <tr>
                                <td>Algorithmique</td>
                                <td>Cours</td>
                                <td>Mme. Saïda</td>
                                <td>16/07/2025</td>
                            </tr>
                            <tr>
                                <td>Base de données</td>
                                <td>Solution TD</td>
                                <td>Mr. Mourad</td>
                                <td>15/07/2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Activité récente -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Activité récente</h4>
                <ul class="list-unstyled mb-0">
                    <li class="pb-2 border-bottom">📥 <strong>Mr. Karim</strong> a ajouté un TD pour "Mathématiques 1"</li>
                    <li class="pb-2 border-bottom">🗑️ <strong>Mr. Mourad</strong> a supprimé un support</li>
                    <li class="pb-2 border-bottom">📤 <strong>Mme. Saïda</strong> a ajouté un Cours "Algo"</li>
                    <li class="pb-2 border-bottom">💬 <strong>Étudiant</strong> a commenté un support</li>
                </ul>
            </div>
        </div>
    </div>
</div>

        
    </div>
</div>
@endsection
