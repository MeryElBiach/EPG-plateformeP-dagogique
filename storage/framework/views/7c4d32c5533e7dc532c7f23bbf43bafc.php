

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2><?php echo e($support->titre); ?></h2>
    <div class="mb-3">
        <span class="badge badge-info"><?php echo e(strtoupper($support->type)); ?></span>
        <span class="text-muted ml-2">Déposé le <?php echo e($support->created_at->format('d/m/Y')); ?></span>
    </div>
    <?php if(Str::endsWith($support->fichier, ['pdf', 'PDF'])): ?>
        <iframe src="<?php echo e(asset('uploads/'.$support->fichier)); ?>" width="100%" height="600px"></iframe>
    <?php else: ?>
        <p>Format non supporté pour l’aperçu en ligne. <a href="<?php echo e(route('support.download', $support->id)); ?>">Télécharger</a></p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Etudiant.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Etudiant/Support/show.blade.php ENDPATH**/ ?>