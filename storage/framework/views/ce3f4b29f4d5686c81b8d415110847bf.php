

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- En-tête -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="ri-edit-2-line"></i> Modifier la formation</h4>
            <a href="<?php echo e(route('admin.formations.index')); ?>" class="btn btn-sm btn-outline-secondary">
                <i class="ri-arrow-go-back-line"></i> Retour
            </a>
        </div>

        <!-- Formulaire -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">📄 Modifier la formation</h5>

                <!-- Affichage des erreurs -->
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Formulaire -->
                <form action="<?php echo e(route('admin.formations.update', $formation)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de la formation</label>
                        <input type="text" name="nom" id="nom" class="form-control" 
                               value="<?php echo e(old('nom', $formation->nom)); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required><?php echo e(old('description', $formation->description)); ?></textarea>
                    </div>

                    <button type="submit" class="btn text-white" style="background: linear-gradient(90deg, #1d3557 0%, #457b9d 100%);">
                        <i class="ri-save-line"></i> Mettre à jour
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Admin/formations/edit.blade.php ENDPATH**/ ?>