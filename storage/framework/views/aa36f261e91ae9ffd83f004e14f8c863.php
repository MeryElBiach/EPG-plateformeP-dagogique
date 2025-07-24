

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
  <h1 class="text-2xl font-bold mb-6">Tous mes supports</h1>

  

  <?php
    $modulesByFormation = $modules->groupBy(fn($m) => $m->formation->nom);
  ?>

  <?php $__currentLoopData = $modulesByFormation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formationName => $modules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section class="mb-12">
      <h2 class="block w-max mx-auto text-center px-4 py-2 font-semibold text-white bg-blue-800 rounded-md mb-4">
        Formation : <?php echo e($formationName); ?>

      </h2>

      <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-8">
          <h3 class="inline-block px-3 py-1 font-medium italic text-indigo-800 border border-indigo-800 rounded-md mb-4">
            Module : <?php echo e($module->nom); ?>

          </h3>

          <?php
            $supports = $module->supports;
            $cours    = $supports->where('type','cours');
            $tds      = $supports->where('type','td');
            $corriges = $supports->where('type','solution');
          ?>

          
          <div class="mb-6">
            <h4 class="text-lg font-bold tracking-wide mb-2">Cours (<?php echo e($cours->count()); ?>)</h4>
            <?php if($cours->isEmpty()): ?>
              <p class="text-gray-500">Aucun cours pour ce module.</p>
            <?php else: ?>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="bg-white shadow-lg rounded-xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-2xl hover:bg-blue-100">
                    <span class="bg-blue-200 text-blue-800 px-2 py-1 text-xs rounded self-start font-medium">Cours</span>
                    <?php if($s->fichier): ?>
                      <a href="<?php echo e(asset('storage/'.$s->fichier)); ?>" target="_blank" class="mt-2 text-gray-600 hover:text-gray-800 flex items-center gap-2">
                        <span class="text-purple-600">📄</span><span>Télécharger PDF</span>
                      </a>
                    <?php endif; ?>
                    <h5 class="mt-4 font-medium text-gray-800"><?php echo e(ltrim($s->titre, '- ')); ?></h5>
                    <p class="text-xs text-gray-500 mt-1"><?php echo e($s->created_at->format('d/m/Y')); ?></p>
                    <div class="mt-4 flex items-center gap-4 text-sm">
                      <a href="<?php echo e(route('enseignant.supports.show', $s)); ?>" title="Voir" class="flex items-center gap-2">
                        <span class="text-purple-600">👁️</span><span><?php echo e($s->views); ?></span>
                      </a>
                      <a href="<?php echo e(route('enseignant.supports.download', $s)); ?>" title="Téléchargements" class="flex items-center gap-2">
                        <span class="text-blue-600">⬆️</span><span><?php echo e($s->downloads); ?></span>
                      </a>
                      <a href="<?php echo e(route('enseignant.supports.edit', $s)); ?>" title="Éditer" class="text-green-500">✏️</a>
                      <form action="<?php echo e(route('enseignant.supports.destroy', $s)); ?>" method="POST" onsubmit="return confirm('Supprimer ce support ?');" class="inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" title="Supprimer" class="text-red-500">🗑</button>
                      </form>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
          </div>

          
          <div class="mb-6">
            <h4 class="text-lg font-bold tracking-wide mb-2">TD (<?php echo e($tds->count()); ?>)</h4>
            <?php if($tds->isEmpty()): ?>
              <p class="text-gray-500">Aucun TD pour ce module.</p>
            <?php else: ?>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <?php $__currentLoopData = $tds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="bg-white shadow-lg rounded-xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-2xl hover:bg-blue-100">
                    <span class="bg-green-200 text-green-800 px-2 py-1 text-xs rounded self-start font-medium">TD</span>
                    <?php if($s->fichier): ?>
                      <a href="<?php echo e(asset('storage/'.$s->fichier)); ?>" target="_blank" class="mt-2 text-gray-600 hover:text-gray-800 flex items-center gap-2">
                        <span class="text-purple-600">📄</span><span>Télécharger PDF</span>
                      </a>
                    <?php endif; ?>
                    <h5 class="mt-4 font-medium text-gray-800"><?php echo e(ltrim($s->titre, '- ')); ?></h5>
                    <p class="text-xs text-gray-500 mt-1"><?php echo e($s->created_at->format('d/m/Y')); ?></p>
                    <div class="mt-4 flex items-center gap-4 text-sm">
                      <a href="#" title="Voir" class="flex items-center gap-2">
                        <span class="text-purple-600">👁️</span><span><?php echo e($s->views); ?></span>
                      </a>
                      <a href="#" title="Téléchargements" class="flex items-center gap-2">
                        <span class="text-blue-600">⬆️</span><span><?php echo e($s->downloads); ?></span>
                      </a>
                      <a href="#" title="Éditer" class="text-green-500">✏️</a>
                      <button title="Supprimer" class="text-red-500">🗑</button>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
          </div>

          
          <div class="mb-6">
            <h4 class="text-lg font-bold tracking-wide mb-2">Corrigés (<?php echo e($corriges->count()); ?>)</h4>
            <?php if($corriges->isEmpty()): ?>
              <p class="text-gray-500">Aucun corrigé pour ce module.</p>
            <?php else: ?>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <?php $__currentLoopData = $corriges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="bg-white shadow-lg rounded-xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-2xl hover:bg-blue-100">
                    <span class="bg-yellow-200 text-yellow-800 px-2 py-1 text-xs rounded self-start font-medium">Corrigé</span>
                    <?php if($s->fichier): ?>
                      <a href="<?php echo e(asset('storage/'.$s->fichier)); ?>" target="_blank" class="mt-2 text-gray-600 hover:text-gray-800 flex items-center gap-2">
                        <span class="text-purple-600">📄</span><span>Télécharger PDF</span>
                      </a>
                    <?php endif; ?>
                    <h5 class="mt-4 font-medium text-gray-800"><?php echo e(ltrim($s->titre, '- ')); ?></h5>
                    <p class="text-xs text-gray-500 mt-1"><?php echo e($s->created_at->format('d/m/Y')); ?></p>
                    <div class="mt-4 flex items-center gap-4 text-sm">
                      <a href="#" title="Voir" class="flex items-center gap-2">
                        <span class="text-purple-600">👁️</span><span><?php echo e($s->views); ?></span>
                      </a>
                      <a href="#" title="Téléchargements" class="flex items-center gap-2">
                        <span class="text-blue-600">⬆️</span><span><?php echo e($s->downloads); ?></span>
                      </a>
                      <a href="#" title="Éditer" class="text-green-500">✏️</a>
                      <button title="Supprimer" class="text-red-500">🗑</button>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
          </div>

        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Enseignant.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/enseignant/supports/index.blade.php ENDPATH**/ ?>