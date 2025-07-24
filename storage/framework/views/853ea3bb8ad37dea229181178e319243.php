

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- Titre + bouton -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="ri-graduation-cap-line"></i> Formations</h4>
            <a href="<?php echo e(route('admin.formations.create')); ?>" class="btn btn-sm text-white" 
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
    <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($index + 1); ?></td>
        <td><?php echo e($formation->nom); ?></td>
        <td style="white-space: normal; max-width: 400px;">
            <div style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                <?php echo e($formation->description); ?>

            </div>
        </td>
        <td><?php echo e($formation->created_at->format('d/m/Y')); ?></td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-2">
               <a href="<?php echo e(route('admin.formations.edit', $formation)); ?>" class="btn btn-sm text-white" style="background-color: #2ecc71;">
                  <i class="ri-edit-line"></i> Modifier
               </a>

                <form action="<?php echo e(route('admin.formations.destroy', $formation)); ?>" method="POST" onsubmit="return confirm('Confirmer ?');">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn btn-sm text-white" style="background-color: #e74c3c;">
                       Supprimer
                  </button>
                </form>              
            </div>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($formations->isEmpty()): ?>
    <tr>
        <td colspan="5" class="text-center text-muted">Aucune formation enregistrée.</td>
    </tr>
    <?php endif; ?>
</tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Admin/formations/index.blade.php ENDPATH**/ ?>