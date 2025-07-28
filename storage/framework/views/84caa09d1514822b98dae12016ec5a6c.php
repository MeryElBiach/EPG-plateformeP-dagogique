

<?php $__env->startSection('title', 'Mes modules'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
  <div class="container-fluid">

    
    <div class="row mb-4">
      <div class="col-12 d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-0">📘 Mes modules</h4>
        <span class="text-muted">Formation : <strong><?php echo e($formation->nom); ?></strong></span>
      </div>
    </div>

    
    <div class="accordion" id="modulesAccordion">
      <?php $__empty_1 = true; $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="accordion-item mb-3 shadow-sm">
          <h2 class="accordion-header" id="heading<?php echo e($module->id); ?>">
            <button class="accordion-button collapsed bg-light" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse<?php echo e($module->id); ?>"
                    aria-expanded="false"
                    aria-controls="collapse<?php echo e($module->id); ?>">
              <div class="me-auto text-start">
                <h5 class="mb-1 fw-semibold"><?php echo e($module->nom); ?></h5>
                <small class="text-muted">
                  Enseignant : <strong>
                    <?php echo e($module->enseignant->prenom ?? '-'); ?>

                    <?php echo e($module->enseignant->nom ?? ''); ?>

                  </strong>
                  &bull; <?php echo e($module->supports->count()); ?> ressources
                </small>
              </div>
            </button>
          </h2>
          <div id="collapse<?php echo e($module->id); ?>"
               class="accordion-collapse collapse"
               aria-labelledby="heading<?php echo e($module->id); ?>"
               data-bs-parent="#modulesAccordion">
            <div class="accordion-body p-0">
              <?php if($module->supports->isNotEmpty()): ?>
                <ul class="list-group list-group-flush">
                  <?php $__currentLoopData = $module->supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $typeKey   = strtolower($support->type);
                      // Classe de badge selon le type
                      $badgeClass = match($typeKey) {
                        'cours'    => 'bg-primary text-white',
                        'td'       => 'bg-success text-white',
                        'solution' => 'bg-warning text-dark',
                        default    => 'bg-secondary text-white'
                      };
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>
                        <span class="fw-medium"><?php echo e($support->titre); ?></span>
                        <span class="badge <?php echo e($badgeClass); ?> ms-2 text-uppercase small">
                          <?php echo e(ucfirst($typeKey)); ?>

                        </span>
                      </div>
                      <a href=""
                         class="btn btn-sm btn-view">
                        Voir
                      </a>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              <?php else: ?>
                <p class="text-muted text-center my-3">Aucun support disponible pour ce module.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-warning text-center">
          Aucun module disponible pour votre formation.
        </div>
      <?php endif; ?>
    </div>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
  .accordion-item {
    border-radius: 8px;
    overflow: hidden;
  }
  .accordion-button {
    font-size: 1rem;
    font-weight: 600;
  }
  .fw-medium, .fw-semibold {
    font-weight: 500;
  }
  /* Bouton “Voir” : fond bleu ciel pour tous les types */
  .btn-view {
    background-color: #05b1faff;
    color: #f7f9fbff;
    border: 1px solid #a0d9ff;
    transition: background-color 0.2s, filter 0.2s;
  }
  .btn-view:hover {
    filter: brightness(110%);
  }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Etudiant.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Etudiant/Module/index.blade.php ENDPATH**/ ?>