@extends('Enseignant.layout')

@section('content')
<div class="container mx-auto p-6">
  <h1 class="text-2xl font-bold mb-6">Tous mes supports</h1>

  {{-- Barre de filtres (à implémenter) --}}

  @php
    $modulesByFormation = $modules->groupBy(fn($m) => $m->formation->nom);
  @endphp

  @foreach($modulesByFormation as $formationName => $modules)
    <section class="mb-12">
      <h2 class="block w-max mx-auto text-center px-4 py-2 font-semibold text-white bg-blue-800 rounded-md mb-4">
        Formation : {{ $formationName }}
      </h2>

      @foreach($modules as $module)
        <div class="mb-8">
          <h3 class="inline-block px-3 py-1 font-medium italic text-indigo-800 border border-indigo-800 rounded-md mb-4">
            Module : {{ $module->nom }}
          </h3>

          @php
            $supports = $module->supports;
            $cours    = $supports->where('type','cours');
            $tds      = $supports->where('type','td');
            $corriges = $supports->where('type','solution');
          @endphp

          {{-- Section Cours --}}
          <div class="mb-6">
            <h4 class="text-lg font-bold tracking-wide mb-2">Cours ({{ $cours->count() }})</h4>
            @if($cours->isEmpty())
              <p class="text-gray-500">Aucun cours pour ce module.</p>
            @else
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                @foreach($cours as $s)
                  <div class="bg-white shadow-lg rounded-xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-2xl hover:bg-blue-100">
                    <span class="bg-blue-200 text-blue-800 px-2 py-1 text-xs rounded self-start font-medium">Cours</span>
                    @if($s->fichier)
                      <a href="{{ asset('storage/'.$s->fichier) }}" target="_blank" class="mt-2 text-gray-600 hover:text-gray-800 flex items-center gap-2">
                        <span class="text-purple-600">📄</span><span>Télécharger PDF</span>
                      </a>
                    @endif
                    <h5 class="mt-4 font-medium text-gray-800">{{ ltrim($s->titre, '- ') }}</h5>
                    <p class="text-xs text-gray-500 mt-1">{{ $s->created_at->format('d/m/Y') }}</p>
                    <div class="mt-4 flex items-center gap-4 text-sm">
                      <a href="{{ route('enseignant.supports.show', $s) }}" title="Voir" class="flex items-center gap-2">
                        <span class="text-purple-600">👁️</span><span>{{ $s->views }}</span>
                      </a>
                      <a href="{{ route('enseignant.supports.download', $s) }}" title="Téléchargements" class="flex items-center gap-2">
                        <span class="text-blue-600">⬆️</span><span>{{ $s->downloads }}</span>
                      </a>
                      <a href="{{ route('enseignant.supports.edit', $s) }}" title="Éditer" class="text-green-500">✏️</a>
                      <form action="{{ route('enseignant.supports.destroy', $s) }}" method="POST" onsubmit="return confirm('Supprimer ce support ?');" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" title="Supprimer" class="text-red-500">🗑</button>
                      </form>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>

          {{-- Section TD --}}
          <div class="mb-6">
            <h4 class="text-lg font-bold tracking-wide mb-2">TD ({{ $tds->count() }})</h4>
            @if($tds->isEmpty())
              <p class="text-gray-500">Aucun TD pour ce module.</p>
            @else
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                @foreach($tds as $s)
                  <div class="bg-white shadow-lg rounded-xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-2xl hover:bg-blue-100">
                    <span class="bg-green-200 text-green-800 px-2 py-1 text-xs rounded self-start font-medium">TD</span>
                    @if($s->fichier)
                      <a href="{{ asset('storage/'.$s->fichier) }}" target="_blank" class="mt-2 text-gray-600 hover:text-gray-800 flex items-center gap-2">
                        <span class="text-purple-600">📄</span><span>Télécharger PDF</span>
                      </a>
                    @endif
                    <h5 class="mt-4 font-medium text-gray-800">{{ ltrim($s->titre, '- ') }}</h5>
                    <p class="text-xs text-gray-500 mt-1">{{ $s->created_at->format('d/m/Y') }}</p>
                    <div class="mt-4 flex items-center gap-4 text-sm">
                      <a href="#" title="Voir" class="flex items-center gap-2">
                        <span class="text-purple-600">👁️</span><span>{{ $s->views }}</span>
                      </a>
                      <a href="#" title="Téléchargements" class="flex items-center gap-2">
                        <span class="text-blue-600">⬆️</span><span>{{ $s->downloads }}</span>
                      </a>
                      <a href="#" title="Éditer" class="text-green-500">✏️</a>
                      <button title="Supprimer" class="text-red-500">🗑</button>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>

          {{-- Section Corrigés --}}
          <div class="mb-6">
            <h4 class="text-lg font-bold tracking-wide mb-2">Corrigés ({{ $corriges->count() }})</h4>
            @if($corriges->isEmpty())
              <p class="text-gray-500">Aucun corrigé pour ce module.</p>
            @else
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                @foreach($corriges as $s)
                  <div class="bg-white shadow-lg rounded-xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-2xl hover:bg-blue-100">
                    <span class="bg-yellow-200 text-yellow-800 px-2 py-1 text-xs rounded self-start font-medium">Corrigé</span>
                    @if($s->fichier)
                      <a href="{{ asset('storage/'.$s->fichier) }}" target="_blank" class="mt-2 text-gray-600 hover:text-gray-800 flex items-center gap-2">
                        <span class="text-purple-600">📄</span><span>Télécharger PDF</span>
                      </a>
                    @endif
                    <h5 class="mt-4 font-medium text-gray-800">{{ ltrim($s->titre, '- ') }}</h5>
                    <p class="text-xs text-gray-500 mt-1">{{ $s->created_at->format('d/m/Y') }}</p>
                    <div class="mt-4 flex items-center gap-4 text-sm">
                      <a href="#" title="Voir" class="flex items-center gap-2">
                        <span class="text-purple-600">👁️</span><span>{{ $s->views }}</span>
                      </a>
                      <a href="#" title="Téléchargements" class="flex items-center gap-2">
                        <span class="text-blue-600">⬆️</span><span>{{ $s->downloads }}</span>
                      </a>
                      <a href="#" title="Éditer" class="text-green-500">✏️</a>
                      <button title="Supprimer" class="text-red-500">🗑</button>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>

        </div>
      @endforeach
    </section>
  @endforeach
</div>
@endsection
