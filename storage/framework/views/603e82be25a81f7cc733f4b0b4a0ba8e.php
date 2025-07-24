

<?php $__env->startSection('content'); ?>
<style>
    :root{
        --epg-blue:#1d3557;
        --epg-blue-light:#457b9d;
        --epg-orange:#e76f00;
    }
    /* en‑tête des tableaux */
    .epg-thead{
        background:linear-gradient(90deg,var(--epg-blue) 0%,var(--epg-blue-light) 100%);
        color:#fff;
    }
    /* ruban compact “Formation” */
    .epg-ribbon{
        display:inline-block;                 /* largeur auto = texte */
        padding:.55rem 1.2rem;
        background:linear-gradient(90deg,var(--epg-blue) 0%,var(--epg-orange) 100%);
        color:#fff;
        border-radius:.45rem .45rem 0 0;
        font-weight:600;
        box-shadow:0 2px 4px rgba(0,0,0,.06);
        letter-spacing:.2px;
    }
    .epg-ribbon i{margin-right:.5rem;}
</style>

<div class="page-content">
  <div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0"><i class="ri-layout-grid-line"></i> Modules par formation</h4>

        <a href="<?php echo e(route('admin.modules.create')); ?>"
           class="btn btn-sm text-white"
           style="background:linear-gradient(90deg,var(--epg-blue) 0%,var(--epg-blue-light) 100%);">
            <i class="ri-add-line align-middle"></i> Ajouter un module
        </a>
    </div>

    <?php
        /* Icônes discrètes (Remix Icon) par domaine IT */
        $icons = [
            'Qualification'            => 'ri-book-2-line',
            'Technicien'               => 'ri-tools-line',
            'Technicien Spécialisé'    => 'ri-cpu-line',
            'Technicien Supérieur'     => 'ri-server-line',
            'Licence Professionnelle'  => 'ri-graduation-cap-line',
            'Master Professionnel'     => 'ri-medal-line',
        ];
    ?>

    <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        
        <div class="epg-ribbon mt-4">
            <i class="<?php echo e($icons[$formation->nom] ?? 'ri-book-mark-line'); ?>"></i>
            <?php echo e($formation->nom); ?>

        </div>
         
        
        <div class="table-responsive shadow-sm mb-4">
            <table class="table table-bordered align-middle mb-0">
                <thead class="epg-thead">
                    <tr>
                        <th style="width:4%">#</th>
                        <th style="width:22%">Nom du module</th>
                        <th style="width:27%">Éléments</th>
                        <th style="width:17%">Professeur</th>
                        <th style="width:12%">Créé le</th>
                        <th class="text-center" style="width:18%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $formation->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($idx+1); ?></td>

                            <td><?php echo e($module->nom); ?></td>

                            <td style="white-space:normal">
                                <ul class="mb-0">
                                    <?php $__currentLoopData = explode("\n", $module->elements); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($el); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </td>

                            <td>
                                <?php if(isset($module->enseignant)): ?>
                                    <?php echo e($module->enseignant->nom); ?> <?php echo e($module->enseignant->prenom); ?>

                                <?php else: ?>
                                    <span class="text-muted">À pourvoir</span>
                                <?php endif; ?>
                            </td>

                            <td><?php echo e($module->created_at->format('d/m/Y')); ?></td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="<?php echo e(route('admin.modules.edit',$module)); ?>"
                                       class="btn btn-sm text-white" style="background:#2ecc71">
                                         Modifier
                                    </a>

                                    <form action="<?php echo e(route('admin.modules.destroy', $module)); ?>" method="POST">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm text-white"
                                                style="background:#e74c3c">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Aucun module pour cette formation.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Admin/modules/index.blade.php ENDPATH**/ ?>