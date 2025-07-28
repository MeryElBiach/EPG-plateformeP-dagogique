@extends('Etudiant.layout')

@section('content')
<style>
  /* === Header blanc === */
  .header-card {
    background: #FFFFFF;
    border-radius: 8px;
    padding: 1rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 2rem 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  }
  .header-title {
    display: flex;
    align-items: center;
    font-size: 1.9rem;
    color: #0277BD;
    font-weight: 600;
  }
  .header-title-icon {
    font-size: 2.2rem;
    margin-right: .6rem;
  }
  .header-formation {
    font-size: 1rem;
    color: #555;
    font-weight: 500;
  }

  /* === Carte support épurée === */
  .support-card {
    border-radius: 12px;
    background: #FFFFFF;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    display: flex;
    flex-direction: column;
    height: 100%;
  }
  .support-card .card-header {
    display: flex;
    align-items: center;
    padding: .75rem 1rem;
    border-bottom: none;
  }
  .support-card-title {
    font-weight: 600;
    margin: 0;
    flex: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .meta {
    color: #6B7280;
    font-size: .85rem;
    margin: .5rem 1rem;
  }
  .actions {
    margin: .5rem 1rem;
    display: flex;
    align-items: center;
    gap: .5rem;
  }

  /* === Bouton favoris cœur === */
  .favorite-btn {
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
  }
  .favorite-btn .fa-heart {
    font-size: 1.2em;
    transition: color .2s;
  }
  .favorite-btn .filled {
    color: #E53E3E;
  }
  .favorite-btn .outline {
    color: #718096;
  }

  /* === Panels d’évaluation & commentaires === */
  .accordion-toggle {
    background: none;
    border: none;
    padding: 0 .75rem;
    font-size: .9rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
  }
  .evaluation-panel,
  .comment-panel {
    display: none;
    background: #F8FAFC;
    padding: .75rem 1rem;
    border-radius: 10px;
    margin: .5rem 1rem;
  }
  .etoiles { font-size: 1.5rem; }
  .star {
    cursor: pointer;
    color: #e4bc24;
    transition: color .2s, transform .2s;
  }
  .star.selected { color: #F6C244; }
  .star:hover,
  .star:hover ~ .star { color: #FFD600; transform: scale(1.2); }

  /* === Toggle liste commentaires === */
  .comment-toggle-link {
    display: inline-block;
    margin: .5rem 1rem;
    font-size: .9rem;
    color: #555;
    cursor: pointer;
    text-decoration: underline;
  }
  .comment-list {
    display: none;
    margin: .5rem 1rem 1rem;
    padding: .75rem;
    background: #FFFFFF;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  }
  .comment-item {
    margin-bottom: .75rem;
  }
  .comment-item strong {
    margin-right: .5rem;
    font-weight: 600;
  }
</style>

<div class="container py-4">

  {{-- Header Mes favoris --}}
  <div class="header-card">
    <div class="header-title">
      <span class="header-title-icon">❤️</span>
      Mes favoris
    </div>
    <div class="header-formation">
      Formation : {{ Auth::user()->formation->nom }}
    </div>
  </div>

  @if($favoris->isEmpty())
    <div class="alert alert-info">Vous n'avez aucun support en favoris.</div>
  @else
    <div class="row">
      @foreach($favoris as $support)
        <div class="col-lg-4 col-md-6 mb-4 d-flex">
          <div class="support-card w-100 d-flex flex-column">

            {{-- En‑tête --}}
            <div class="card-header">
              <h5 class="support-card-title">{{ $support->titre }}</h5>
              <div class="ml-auto">
                <form action="{{ route('etudiant.favoris.destroy', $support->id) }}"
                      method="POST"
                      class="favorite-form d-inline">
                  @csrf @method('DELETE')
                  <button type="submit"
                          class="favorite-btn"
                          title="Retirer des favoris">
                    <i class="fas fa-heart filled"></i>
                  </button>
                </form>
              </div>
            </div>

            {{-- Date de dépôt --}}
            <div class="meta">
              Déposé le : {{ $support->created_at->format('d/m/Y') }}
            </div>

            {{-- Aperçu / Télécharger --}}
            <div class="actions">
              <a href="{{ route('etudiant.support.preview', $support->id) }}"
                 target="_blank"
                 class="btn btn-outline-secondary btn-sm">👁️ Aperçu</a>
              <a href="{{ route('etudiant.support.download', $support->id) }}"
                 class="btn btn-primary btn-sm">⬇️ Télécharger</a>
            </div>

            {{-- Évaluer / Commentaires toggles --}}
            <div class="d-flex" style="margin:.5rem 1rem; gap:1rem;">
              <button class="accordion-toggle text-primary toggle-link"
                      data-target="eval-{{ $support->id }}">
                ⭐ Évaluer
              </button>
              <button class="accordion-toggle text-success toggle-link"
                      data-target="comm-{{ $support->id }}">
                💬 Commentaires ({{ $support->commentaires->count() }})
              </button>
            </div>

            {{-- Panel Évaluation --}}
            <div id="eval-{{ $support->id }}"
                 class="evaluation-panel">
              <form method="POST"
                    action="{{ route('etudiant.support.evaluer', $support->id) }}">
                @csrf
                <div class="etoiles mb-2" data-support="{{ $support->id }}">
                  @for($i=1; $i<=5; $i++)
                    <span class="star {{ ($support->user_note && $i <= $support->user_note) ? 'selected':'' }}"
                          data-value="{{ $i }}">
                      {{ ($support->user_note && $i <= $support->user_note) ? '★':'☆' }}
                    </span>
                  @endfor
                </div>
                <input type="hidden"
                       name="note"
                       id="input-note-{{ $support->id }}"
                       value="{{ $support->user_note ?? 0 }}">
                <button type="submit"
                        class="btn btn-outline-success btn-sm">
                  Noter
                </button>
              </form>
            </div>

            {{-- Panel Commentaires --}}
            <div id="comm-{{ $support->id }}"
                 class="comment-panel">
              <form method="POST"
                    action="{{ route('etudiant.support.commenter', $support->id) }}">
                @csrf
                <textarea name="contenu"
                          class="form-control mb-2"
                          rows="2"
                          placeholder="Votre commentaire…"></textarea>
                <button type="submit"
                        class="btn btn-primary btn-sm">Envoyer</button>
              </form>

              @if($support->commentaires->count())
                <span class="comment-toggle-link"
                      data-target="list-{{ $support->id }}">
                  Voir commentaires ({{ $support->commentaires->count() }})
                </span>
                <div id="list-{{ $support->id }}"
                     class="comment-list">
                  @foreach($support->commentaires as $comm)
                    <div class="comment-item">
                      <strong>
                        @if($comm->etudiant->id === Auth::id())
                          Vous
                        @else
                          {{ $comm->etudiant->prenom }} {{ $comm->etudiant->nom }}
                        @endif
                      </strong>
                      {{ $comm->contenu }}
                    </div>
                  @endforeach
                </div>
              @endif
            </div>

            <div class="mt-auto"></div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection

@push('scripts')
<script>
  // Toggle Évaluer / Commentaires panels
  document.querySelectorAll('.toggle-link').forEach(btn => {
    btn.addEventListener('click', () => {
      const tgt = document.getElementById(btn.dataset.target);
      tgt.style.display = tgt.style.display === 'block' ? 'none' : 'block';
    });
  });

  // Toggle liste des commentaires existants
  document.querySelectorAll('.comment-toggle-link').forEach(link => {
    link.addEventListener('click', () => {
      const list = document.getElementById(link.dataset.target);
      list.style.display = list.style.display === 'block' ? 'none' : 'block';
    });
  });

  // Initialise les étoiles cliquables
  document.querySelectorAll('.etoiles').forEach(group => {
    const id    = group.dataset.support;
    const stars = group.querySelectorAll('.star');
    const input = document.getElementById('input-note-' + id);
    let cur     = parseInt(input.value) || 0;
    stars.forEach((s,i) => {
      s.classList.toggle('selected', i < cur);
      s.textContent = i < cur ? '★' : '☆';
    });
    stars.forEach(s => s.addEventListener('click', () => {
      const v = parseInt(s.dataset.value);
      input.value = v;
      stars.forEach((ss,idx) => {
        ss.classList.toggle('selected', idx < v);
        ss.textContent = idx < v ? '★' : '☆';
      });
    }));
  });

  // Basculer le cœur favoris au clic
  document.querySelectorAll('.favorite-form').forEach(form => {
    form.addEventListener('submit', () => {
      const icon = form.querySelector('i.fa-heart');
      if (icon.classList.contains('outline')) {
        icon.classList.replace('far','fas');
        icon.classList.replace('outline','filled');
        icon.style.color = '#E53E3E';
      }
    });
  });
</script>
@endpush
