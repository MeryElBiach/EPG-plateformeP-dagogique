

<?php $__env->startSection('content'); ?>
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

  /* === Titre module === */
  .module-title {
    font-size: 1.6rem;
    font-weight: 700;
    color: #205ba6;
    margin: 2rem 0 1rem;
    border-bottom: 2px solid #E2E8F0;
    padding-bottom: .5rem;
  }

  /* === Titre type (Cours, TD…) === */
  .type-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: #2B6CB0;
    margin: 1rem 0 0.75rem;
  }

  /* === Carte support === */
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
    height: 48px;
    padding: .75rem 1rem;
    border-bottom: none;
  }
  .support-card-title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-weight: 600;
    margin: 0;
  }
  .badge-type {
    font-size: 1.1rem;
    margin-right: .5rem;
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

  /* === Bouton favoris === */
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
  .favorite-btn .fa-heart.filled {
    color: #E53E3E;
  }
  .favorite-btn .fa-heart.outline {
    color: #718096;
  }

  /* === Panels === */
  .evaluation-panel,
  .comment-panel {
    background: #F8FAFC;
    padding: .75rem 1rem;
    border-radius: 10px;
    margin: .5rem 1rem;
  }
  .accordion-toggle {
    background: none;
    border: none;
    padding: 0 .75rem;
    font-size: .9rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
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

  /* === Comment list toggle === */
  .comment-toggle-link {
    display: inline-block;
    margin: .5rem 1rem;
    font-size: .9rem;
    color: #555;
    cursor: pointer;
    text-decoration: underline;
  }
  .comment-list {
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

  
  <div class="header-card">
    <div class="header-title">
      <span class="header-title-icon">📚</span>
      Mes supports
    </div>
    <div class="header-formation">
      Formation : <?php echo e(Auth::user()->formation->nom); ?>

    </div>
  </div>

  <?php
    $labels = [
      'cours'    => '📘 Cours',
      'td'       => '📙 TD',
      'solution' => '📗 Solutions',
    ];
  ?>

  
  <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($module->supports->isNotEmpty()): ?>
      <h2 class="module-title">
        Module : <?php echo e($module->nom); ?>

      </h2>

      <?php
        $byType = $module->supports->groupBy('type');
      ?>

      
      <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($byType[$type])): ?>
          <h3 class="type-title">
            <?php echo $label; ?> (<?php echo e($byType[$type]->count()); ?>)
          </h3>
          <div class="row mb-4">
            <?php $__currentLoopData = $byType[$type]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-4 col-md-6 mb-3 d-flex">
                <div class="support-card w-100 d-flex flex-column">

                  
                  <div class="card-header">
                    <span class="badge-type"><?php echo $label; ?></span>
                    <h5 class="support-card-title"><?php echo e($support->titre); ?></h5>
                  </div>

                  
                  <div class="meta">
                    Déposé le : <?php echo e($support->created_at->format('d/m/Y')); ?>

                  </div>

                  
                  <div class="actions">
                    <a href="<?php echo e(route('etudiant.support.preview', $support->id)); ?>"
                       target="_blank"
                       class="btn btn-outline-secondary btn-sm">👁️ Aperçu</a>

                    <a href="<?php echo e(route('etudiant.support.download', $support->id)); ?>"
                       class="btn btn-primary btn-sm">⬇️ Télécharger</a>

                    
                    <div class="ml-auto">
                      <?php if(in_array($support->id, $favIds)): ?>
                        <form action="<?php echo e(route('etudiant.favoris.destroy', $support->id)); ?>"
                              method="POST" class="d-inline favorite-form">
                          <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                          <button type="submit"
                                  class="favorite-btn"
                                  title="Retirer des favoris">
                            <i class="fas fa-heart filled"></i>
                          </button>
                        </form>
                      <?php else: ?>
                        <form action="<?php echo e(route('etudiant.favoris.store', $support->id)); ?>"
                              method="POST" class="d-inline favorite-form">
                          <?php echo csrf_field(); ?>
                          <button type="submit"
                                  class="favorite-btn"
                                  title="Ajouter aux favoris">
                            <i class="far fa-heart outline"></i>
                          </button>
                        </form>
                      <?php endif; ?>
                    </div>
                  </div>

                  
                  <div class="d-flex" style="margin:.5rem 1rem; gap:1rem;">
                    <button class="accordion-toggle text-primary toggle-link"
                            data-target="eval-<?php echo e($support->id); ?>">
                      ⭐ Évaluer
                    </button>
                    <button class="accordion-toggle text-success toggle-link"
                            data-target="comm-<?php echo e($support->id); ?>">
                      💬 Commentaires (<?php echo e($support->commentaires->count()); ?>)
                    </button>
                  </div>

                  
                  <div id="eval-<?php echo e($support->id); ?>"
                       class="evaluation-panel"
                       style="display:none;">
                    <form method="POST"
                          action="<?php echo e(route('etudiant.support.evaluer', $support->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <div class="etoiles mb-2"
                           data-support="<?php echo e($support->id); ?>">
                        <?php for($i=1; $i<=5; $i++): ?>
                          <span class="star <?php echo e(($support->user_note && $i <= $support->user_note) ? 'selected' : ''); ?>"
                                data-value="<?php echo e($i); ?>">
                            <?php echo e(($support->user_note && $i <= $support->user_note) ? '★' : '☆'); ?>

                          </span>
                        <?php endfor; ?>
                      </div>
                      <input type="hidden"
                             name="note"
                             id="input-note-<?php echo e($support->id); ?>"
                             value="<?php echo e($support->user_note ?? 0); ?>">
                      <button type="submit"
                              class="btn btn-outline-success btn-sm">
                        Noter
                      </button>
                    </form>
                  </div>

                  
                  <div id="comm-<?php echo e($support->id); ?>"
                       class="comment-panel"
                       style="display:none;">
                    
                    <form method="POST"
                          action="<?php echo e(route('etudiant.support.commenter', $support->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <textarea name="contenu"
                                class="form-control mb-2"
                                rows="2"
                                placeholder="Votre commentaire…"></textarea>
                      <button type="submit"
                              class="btn btn-primary btn-sm">Envoyer</button>
                    </form>

                    
                    <?php if($support->commentaires->count()): ?>
                      <span class="comment-toggle-link"
                            data-target="list-<?php echo e($support->id); ?>">
                        Voir commentaires (<?php echo e($support->commentaires->count()); ?>)
                      </span>
                      <div id="list-<?php echo e($support->id); ?>"
                           class="comment-list"
                           style="display:none;">
                        <?php $__currentLoopData = $support->commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="comment-item">
                            <strong>
                              <?php if($comm->etudiant->id === Auth::id()): ?>
                                Vous
                              <?php else: ?>
                                <?php echo e($comm->etudiant->prenom); ?> <?php echo e($comm->etudiant->nom); ?>

                              <?php endif; ?>
                            </strong>
                            <?php echo e($comm->contenu); ?>

                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    <?php endif; ?>
                  </div>

                  <div class="mt-auto"></div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  // bascule panels Évaluer / Commentaires
  document.querySelectorAll('.toggle-link').forEach(btn => {
    btn.addEventListener('click', () => {
      const tgt = document.getElementById(btn.dataset.target);
      tgt.style.display = tgt.style.display === 'block' ? 'none' : 'block';
    });
  });
  // bascule liste des commentaires existants
  document.querySelectorAll('.comment-toggle-link').forEach(link => {
    link.addEventListener('click', () => {
      const list = document.getElementById(link.dataset.target);
      list.style.display = list.style.display === 'block' ? 'none' : 'block';
    });
  });
  // bascule visuel favoris au clic
  document.querySelectorAll('.favorite-form').forEach(form => {
    form.addEventListener('submit', e => {
      const icon = form.querySelector('i.fa-heart');
      if (icon.classList.contains('outline')) {
        icon.classList.replace('far','fas');
        icon.classList.replace('outline','filled');
        icon.style.color = '#E53E3E';
      } else {
        icon.classList.replace('fas','far');
        icon.classList.replace('filled','outline');
        icon.style.color = '#718096';
      }
      // on laisse le formulaire se soumettre
    });
  });
  // initialise les étoiles cliquables
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
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Etudiant.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Etudiant/Support/index.blade.php ENDPATH**/ ?>