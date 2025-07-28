

<?php $__env->startSection('content'); ?>
<div class="container py-4" style="margin-top:40px;">
  <div class="header-card mb-4">
    <div class="header-title">
      <span class="header-title-icon">👤</span>
      Mon compte
    </div>
  </div>

  <div class="row">
    
    <div class="col-md-4 mb-4">
      <div class="support-card p-4 text-center">
        <img src="<?php echo e($user->avatar_url); ?>" alt="Avatar" class="rounded-circle mb-3" width="120" height="120">
        <h4><?php echo e($user->prenom); ?> <?php echo e($user->nom); ?></h4>
        <p class="text-muted"><?php echo e($user->email); ?></p>
        <p class="text-muted">Formation : <?php echo e($user->formation->nom); ?></p>
      </div>
    </div>

    
    <div class="col-md-8">
      
      <ul class="nav nav-tabs mb-3" id="compteTabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="secu-tab" data-toggle="tab" href="#secu" role="tab">Sécurité</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pref-tab" data-toggle="tab" href="#pref" role="tab">Préférences</a>
        </li>
      </ul>

      <div class="tab-content" id="compteTabsContent">
        
        <div class="tab-pane fade show active" id="profil" role="tabpanel">
          <?php echo $__env->make('Etudiant.compte.partials.profil', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        
        <div class="tab-pane fade" id="secu" role="tabpanel">
          <?php echo $__env->make('Etudiant.compte.partials.securite', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        
        <div class="tab-pane fade" id="pref" role="tabpanel">
          <?php echo $__env->make('Etudiant.compte.partials.preferences', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Etudiant.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Etudiant/compte/show.blade.php ENDPATH**/ ?>