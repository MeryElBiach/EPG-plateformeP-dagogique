@extends('Enseignant.layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12">
  <div class="w-full max-w-lg">
    <h1 class="text-3xl font-extrabold text-center mb-8 text-blue-800">
      Modifier le support
    </h1>

    <form method="POST"
          action="{{ route('enseignant.supports.update', $support) }}"
          enctype="multipart/form-data"
          class="bg-white p-8 rounded-2xl shadow-lg space-y-6">
      @csrf
      @method('PUT')

      {{-- Formation --}}
      <div>
        <label for="formation" class="block text-sm font-medium text-black">Formation</label>
        <select id="formation" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-800 focus:ring-4 focus:ring-blue-200">
          <option value="">-- Choisissez une formation --</option>
          @foreach($formations as $f)
            <option value="{{ $f->id }}" {{ $support->module->formation->id == $f->id ? 'selected' : '' }}>
              {{ $f->nom }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Module --}}
      <div>
        <label for="module" class="block text-sm font-medium text-black">Module</label>
        <select id="module" name="module_id" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-800 focus:ring-4 focus:ring-blue-200">
          <option value="">-- D’abord une formation --</option>
        </select>
      </div>

      {{-- Élément --}}
      <div>
        <label for="element" class="block text-sm font-medium text-black">Élément</label>
        <select id="element" name="element" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-800 focus:ring-4 focus:ring-blue-200">
          <option value="">-- D’abord un module --</option>
        </select>
      </div>

      {{-- Type --}}
      <div>
        <label for="type" class="block text-sm font-medium text-black">Type</label>
        <select id="type" name="type" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-800 focus:ring-4 focus:ring-blue-200">
          <option value="">-- Choisissez le type --</option>
          <option value="cours" {{ $support->type=='cours'? 'selected':'' }}>Cours</option>
          <option value="td" {{ $support->type=='td'? 'selected':'' }}>TD</option>
          <option value="solution" {{ $support->type=='solution'? 'selected':'' }}>Corrigé</option>
        </select>
      </div>

      {{-- Fichier --}}
      <div>
        <label for="fichier" class="block text-sm font-medium text-black">Nouveau fichier (optionnel)</label>
        <input type="file" id="fichier" name="fichier" accept="application/pdf"
               class="mt-1 block w-full text-gray-600 file:px-4 file:py-2 file:border-0 file:rounded-lg file:bg-blue-50 file:text-blue-800 hover:file:bg-blue-100">
        @if($support->fichier)
          <p class="mt-2 text-sm text-gray-500">Fichier actuel : <a href="{{ asset('storage/'.$support->fichier) }}" target="_blank" class="underline">Voir</a></p>
        @endif
      </div>

      <button type="submit"
              class="w-full py-3 font-semibold text-white rounded-lg bg-blue-800 hover:bg-blue-900 shadow-md transition-opacity">
        Mettre à jour
      </button>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
  const modulesData = {!! $modulesJs !!};
  const selFormation = document.getElementById('formation');
  const selModule = document.getElementById('module');
  const selElement = document.getElementById('element');

  function populateModules(fid) {
    selModule.innerHTML = '<option value="">-- Sélectionnez un module --</option>';
    selElement.innerHTML = '<option value="">-- D’abord un module --</option>';
    modulesData.filter(m => m.formation === fid).forEach(m => {
      const opt = document.createElement('option');
      opt.value = m.id;
      opt.textContent = m.name;
      if (m.id === {{ $support->module_id }}) opt.selected = true;
      selModule.appendChild(opt);
    });
  }

  function populateElements(mid) {
    selElement.innerHTML = '<option value="">-- Sélectionnez un élément --</option>';
    const mod = modulesData.find(m => m.id === mid);
    if (!mod) return;
    mod.elements.forEach(el => {
      const opt = document.createElement('option');
      opt.value = el;
      opt.textContent = el;
      if (el === '{{ addslashes($support->titre) }}') opt.selected = true;
      selElement.appendChild(opt);
    });
  }

  // Initial load
  document.addEventListener('DOMContentLoaded', () => {
    const initialFormation = {{ $support->module->formation->id }};
    populateModules(initialFormation);
    populateElements({{ $support->module_id }});
  });

  selFormation.addEventListener('change', () => {
    populateModules(parseInt(selFormation.value,10));
  });

  selModule.addEventListener('change', () => {
    populateElements(parseInt(selModule.value,10));
  });
</script>
@endpush
