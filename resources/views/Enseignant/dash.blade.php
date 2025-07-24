@extends('Enseignant.layout')

@section('title', 'Tableau de bord Enseignant')

@section('content')
<div class="max-w-7xl mx-auto px-4 pt-8 pb-12 space-y-10">

    {{-- Bandeau de bienvenue --}}
    <header class="relative space-y-2">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Bonjour, Pr. {{ $teacher->prenom }} {{ $teacher->nom }}
            </h1>
            <br>
            <p class="text-sm text-gray-600 font-semibold">
                Voici l’activité liée à vos supports aujourd’hui.
            </p>
        </div>

        <a href=""
           class="absolute top-0 right-0 inline-flex items-center gap-2 px-5 py-2
                  rounded-md text-white bg-blue-600 hover:bg-blue-700 shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Déposer un support
        </a>
    </header>

    {{-- Cartes KPI --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- Supports publiés --}}
        <div class="kpi-card flex items-center gap-4 bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <svg class="w-8 h-8 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 2h8l4 4v14a2 2 0 01-2 2H8a2 2 0 01-2-2V4a2 2 0 012-2z"/>
            </svg>
            <div>
                <p class="kpi-text text-xs uppercase text-gray-500">Supports publiés</p>
                <p class="kpi-text mt-1 text-2xl font-bold">{{ $supportsCount }}</p>
            </div>
        </div>

        {{-- Commentaires reçus --}}
        <div class="kpi-card flex items-center gap-4 bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <svg class="w-8 h-8 text-teal-500 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17 8H3a1 1 0 00-1 1v7l3-3h12a1 1 0 001-1V9a1 1 0 00-1-1z"/>
            </svg>
            <div>
                <p class="kpi-text text-xs uppercase text-gray-500">Commentaires reçus</p>
                <p class="kpi-text mt-1 text-2xl font-bold text-gray-800">{{ $commentsCount }}</p>
            </div>
        </div>

        {{-- Note moyenne --}}
        <div class="kpi-card flex items-center gap-4 bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <svg class="w-8 h-8 text-yellow-400 shrink-0" fill="currentColor" viewBox="0 0 24 24">
               <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22
                        12 18.27 5.82 22 7 14.14l-5-4.87 6.91-1.01L12 2z"/>
            </svg>
            <div>
                <p class="kpi-text text-xs uppercase text-gray-500">Note ★ moyenne</p>
                <p class="kpi-text mt-1 text-2xl font-bold text-gray-800">{{ $avgRating ?? '—' }}</p>
            </div>
        </div>

        {{-- Dernier support --}}
        <div class="kpi-card flex items-center gap-4 bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <svg class="w-8 h-8 text-gray-500 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 6v6l4 2m-4-10a8 8 0 100 16 8 8 0 000-16z"/>
            </svg>
            <div>
                <p class="kpi-text text-xs uppercase text-gray-500">Dernier support</p>
                <p class="kpi-text mt-1 text-2xl font-bold text-gray-800">
                    {{ $lastSupport?->created_at?->format('d/m') ?? '—' }}
                </p>
                @if($lastSupport)
                    <p class="kpi-text text-xs text-gray-500 truncate max-w-[10rem]">
                        {{ $lastSupport->titre }}
                    </p>
                @endif
            </div>
        </div>
    </div>

    {{-- Formations concernées --}}
    <section class="space-y-4">
        <h2 class="text-lg font-semibold text-blue-700">
            Formations concernées ({{ now()->year }})
        </h2>

        @forelse ($formations as $f)
            <div class="flex items-center justify-between bg-gray-50 border-l-4 border-blue-600
                        rounded-r-lg p-4">
                <span class="font-semibold text-gray-800">{{ $f->nom }}</span>
                <span class="text-sm text-gray-600">{{ $f->modules_count }} modules</span>
            </div>
        @empty
            <p class="text-gray-400">Aucune formation attribuée.</p>
        @endforelse
    </section>

    {{-- Activité récente --}}
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <h3 class="text-md font-semibold text-gray-800 mb-4">Derniers supports déposés</h3>
            <ul class="space-y-3 text-sm">
                @forelse ($recentSupports as $s)
                    <li class="flex justify-between">
                        <span class="truncate">{{ $s->titre }}</span>
                        <span class="text-gray-500">{{ $s->created_at->format('d/m') }}</span>
                    </li>
                @empty
                    <li class="text-gray-400">— Aucun support récent —</li>
                @endforelse
            </ul>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <h3 class="text-md font-semibold text-gray-800 mb-4">Derniers commentaires</h3>
            <ul class="space-y-3 text-sm">
                @forelse ($recentComments as $c)
                    <li class="flex justify-between">
                        <span class="truncate">{{ Str::limit($c->contenu, 40) }}</span>
                        <span class="text-gray-500">{{ $c->created_at->format('d/m') }}</span>
                    </li>
                @empty
                    <li class="text-gray-400">— Aucun commentaire récent —</li>
                @endforelse
            </ul>
        </div>
    </section>
  <!-- pensez a faire un to do liste  -->
    {{-- À faire --}}
    <section class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-md font-semibold text-gray-800 mb-4">À faire</h3>
        <ul class="space-y-3 text-sm" id="todo-list">
            @forelse ($todos as $t)
                <li class="flex items-center gap-2">
                    <input type="checkbox" class="todo-checkbox rounded text-green-600">
                    <span>
                        Déposer le fichier pour
                        <span class="font-medium">{{ $t->titre }}</span>
                    </span>
                </li>
            @empty
                <li class="text-gray-400">Aucune tâche pour le moment.</li>
            @endforelse
        </ul>
    </section>

</div>
@endsection

@push('styles')
<style>
:root{
    --epg-brown: #d9792b;         /* plus clair */
    --epg-brown-hover:#c86a1f;    /* optionnel si tu veux une nuance différente */
}
.kpi-card{
    transition: transform .2s ease-out,
                box-shadow .2s ease-out,
                background-color .2s ease-out,
                color .2s ease-out;
    position: relative;
    overflow: hidden;
    border-radius: 0.5rem; /* pour que ::before suive */
}
.kpi-card:hover{
    transform: translateY(-4px) scale(1.03);
    box-shadow: 0 8px 16px rgba(0,0,0,.15);
}

/* couche colorée indépendante pour le fond */
.kpi-card::before{
    content:"";
    position:absolute;
    inset:0;
    background: var(--epg-brown);
    opacity:0;
    transition: opacity .2s ease-out;
    z-index:0;
    border-radius: inherit;
}
.kpi-card:hover::before{
    opacity:1;
}

/* contenu au-dessus */
.kpi-card > *{
    position: relative;
    z-index:1;
}

/* textes à blanchir (icônes NON affectées) */
.kpi-card:hover .kpi-text{
    color:#fff;
}

/* garde la couleur des icônes telle que définie dans le HTML */
.kpi-card svg{
    position: relative;
    z-index:1;
}

/* optionnel: éclaircir le texte secondaire au hover */
.kpi-card:hover .kpi-text.text-gray-500{
    color: rgba(255,255,255,.8);
}
</style>
@endpush

@push('scripts')
{{-- JS facultatif (rien de requis pour l’effet hover ici) --}}
<script>
/* Tu peux ajouter des interactions JS ici plus tard */
</script>
@endpush
<!-- │ [ Total : 42 ] [ Cours : 20 ] [ TD : 15 ] [ Corrigés : 7 ]│ -->