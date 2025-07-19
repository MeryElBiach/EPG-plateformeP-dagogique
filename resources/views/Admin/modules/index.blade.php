@extends('Admin.layout')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Titre + bouton -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="ri-layout-grid-line"></i> Modules</h4>
            <a href="{{ route('admin.modules.create') }}" class="btn btn-sm text-white" 
               style="background: linear-gradient(90deg, #1d3557 0%, #457b9d 100%);">
                <i class="ri-add-line align-middle"></i> Ajouter un module
            </a>
        </div>
        <!-- Tableau des modules -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Liste des modules</h5>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead style="background: linear-gradient(90deg, #1d3557 0%, #457b9d 100%); color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Nom du module</th>
                                <th>Formation</th>
                                <th>Éléments</th>
                                <th>Date de création</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($modules as $index => $module)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $module->nom }}</td>
                                    <td>{{ $module->formation->nom ?? 'N/A' }}</td>
                                    <td style="white-space: normal; max-width: 300px;">
                                        <ul class="mb-0">
                                            @foreach(explode("\n", $module->elements) as $element)
                                                <li>{{ $element }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $module->created_at->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.modules.edit', $module) }}" class="btn btn-sm text-white" style="background-color: #2ecc71;">
                                                <i class="ri-edit-line"></i> Modifier
                                            </a>
                                            <form action="{{ route('admin.modules.destroy', $module) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm text-white" style="background-color: #e74c3c;">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Aucun module trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
