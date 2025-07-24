@extends('Admin.layout')

@section('content')
<style>
    :root{
        --epg-blue:#1d3557;
        --epg-blue-light:#457b9d;
        --epg-orange:#e76f00;
    }
    /* en‑tête des tableaux */
    .epg-thead{
        background:linear-gradient(90deg,var(--epg-blue) 0%,var(--epg-blue-light) 100%);
        color:#fff;
    }
    /* ruban compact “Formation” */
    .epg-ribbon{
        display:inline-block;                 /* largeur auto = texte */
        padding:.55rem 1.2rem;
        background:linear-gradient(90deg,var(--epg-blue) 0%,var(--epg-orange) 100%);
        color:#fff;
        border-radius:.45rem .45rem 0 0;
        font-weight:600;
        box-shadow:0 2px 4px rgba(0,0,0,.06);
        letter-spacing:.2px;
    }
    .epg-ribbon i{margin-right:.5rem;}
</style>

<div class="page-content">
  <div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0"><i class="ri-layout-grid-line"></i> Modules par formation</h4>

        <a href="{{ route('admin.modules.create') }}"
           class="btn btn-sm text-white"
           style="background:linear-gradient(90deg,var(--epg-blue) 0%,var(--epg-blue-light) 100%);">
            <i class="ri-add-line align-middle"></i> Ajouter un module
        </a>
    </div>

    @php
        /* Icônes discrètes (Remix Icon) par domaine IT */
        $icons = [
            'Qualification'            => 'ri-book-2-line',
            'Technicien'               => 'ri-tools-line',
            'Technicien Spécialisé'    => 'ri-cpu-line',
            'Technicien Supérieur'     => 'ri-server-line',
            'Licence Professionnelle'  => 'ri-graduation-cap-line',
            'Master Professionnel'     => 'ri-medal-line',
        ];
    @endphp

    @foreach ($formations as $formation)

        {{-- Ruban formation --}}
        <div class="epg-ribbon mt-4">
            <i class="{{ $icons[$formation->nom] ?? 'ri-book-mark-line' }}"></i>
            {{ $formation->nom }}
        </div>
         
        {{-- Tableau modules --}}
        <div class="table-responsive shadow-sm mb-4">
            <table class="table table-bordered align-middle mb-0">
                <thead class="epg-thead">
                    <tr>
                        <th style="width:4%">#</th>
                        <th style="width:22%">Nom du module</th>
                        <th style="width:27%">Éléments</th>
                        <th style="width:17%">Professeur</th>
                        <th style="width:12%">Créé le</th>
                        <th class="text-center" style="width:18%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($formation->modules as $idx => $module)
                        <tr>
                            <td>{{ $idx+1 }}</td>

                            <td>{{ $module->nom }}</td>

                            <td style="white-space:normal">
                                <ul class="mb-0">
                                    @foreach (explode("\n", $module->elements) as $el)
                                        <li>{{ $el }}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td>
                                @isset($module->enseignant)
                                    {{ $module->enseignant->nom }} {{ $module->enseignant->prenom }}
                                @else
                                    <span class="text-muted">À pourvoir</span>
                                @endisset
                            </td>

                            <td>{{ $module->created_at->format('d/m/Y') }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.modules.edit',$module) }}"
                                       class="btn btn-sm text-white" style="background:#2ecc71">
                                         Modifier
                                    </a>

                                    <form action="{{ route('admin.modules.destroy', $module) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-white"
                                                style="background:#e74c3c">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Aucun module pour cette formation.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endforeach

  </div>
</div>
@endsection
