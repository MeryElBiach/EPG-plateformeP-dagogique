@extends('Etudiant.layout')

@section('content')
<div class="container py-4">
    <h2>{{ $support->titre }}</h2>
    <div class="mb-3">
        <span class="badge badge-info">{{ strtoupper($support->type) }}</span>
        <span class="text-muted ml-2">Déposé le {{ $support->created_at->format('d/m/Y') }}</span>
    </div>
    @if(Str::endsWith($support->fichier, ['pdf', 'PDF']))
        <iframe src="{{ asset('uploads/'.$support->fichier) }}" width="100%" height="600px"></iframe>
    @else
        <p>Format non supporté pour l’aperçu en ligne. <a href="{{ route('support.download', $support->id) }}">Télécharger</a></p>
    @endif
</div>
@endsection