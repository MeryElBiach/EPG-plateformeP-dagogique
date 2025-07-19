@extends('Admin.layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Titre + bouton -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="ri-graduation-cap-line"></i> Formations</h4>
            <a href="{{ route('admin.formations.create') }}" class="btn btn-sm text-white" 
               style="background: linear-gradient(90deg, #1d3557 0%, #457b9d 100%);">
                <i class="ri-add-line align-middle"></i> Ajouter une formation
            </a>
        </div>

        <!-- Tableau des formations -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Liste des formations</h5>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead style="background: linear-gradient(90deg, #1d3557 0%, #457b9d 100%); color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Date de création</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
<tbody>
    @foreach($formations as $index => $formation)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $formation->nom }}</td>
        <td style="white-space: normal; max-width: 400px;">
            <div style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                {{ $formation->description }}
            </div>
        </td>
        <td>{{ $formation->created_at->format('d/m/Y') }}</td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-2">
               <a href="{{ route('admin.formations.edit', $formation) }}" class="btn btn-sm text-white" style="background-color: #2ecc71;">
                  <i class="ri-edit-line"></i> Modifier
               </a>

                <form action="{{ route('admin.formations.destroy', $formation) }}" method="POST" onsubmit="return confirm('Confirmer ?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm text-white" style="background-color: #e74c3c;">
                       Supprimer
                  </button>
                </form>              
            </div>
        </td>
    </tr>
    @endforeach

    @if($formations->isEmpty())
    <tr>
        <td colspan="5" class="text-center text-muted">Aucune formation enregistrée.</td>
    </tr>
    @endif
</tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
