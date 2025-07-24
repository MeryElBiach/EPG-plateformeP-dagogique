


<?php $__env->startSection('title', 'Mes Modules'); ?>

<?php $__env->startSection('content'); ?>
<div x-data class="max-w-7xl mx-auto py-10 px-4">

    
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Mes Modules</h1>
        <p class="text-sm text-gray-500 mt-1">
            Vous gérez <?php echo e($modules->count()); ?> modules répartis sur <?php echo e($modulesByFormation->count()); ?> formations.
        </p>
    </div>

    
    <div class="space-y-6">
        <?php $__empty_1 = true; $__currentLoopData = $modulesByFormation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formationName => $mods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div x-data="{ open:true }" class="rounded-xl overflow-hidden shadow-sm border border-gray-200 bg-white/70 backdrop-blur">
                
                <button @click="open=!open"
                        class="w-full flex items-center justify-between px-6 py-4 bg-gray-50 hover:bg-gray-100">
                    <span class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="ri-graduation-cap-line text-blue-700"></i>
                        <?php echo e($formationName); ?>

                        <span class="text-gray-500 text-sm">(<?php echo e($mods->count()); ?> modules)</span>
                    </span>
                    <i :class="open ? 'ri-arrow-up-s-line' : 'ri-arrow-down-s-line'" class="text-xl text-gray-500"></i>
                </button>

                
                <div x-show="open" x-transition.origin.top class="px-6 py-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            /* ─────────── Calculs envoyés par le contrôleur ─────────── */
                            $supports        = $module->supports_count;    // total supports
                            $elements        = 3;                          // 3 types requis (cours/TD/solution)
                            $progress        = $module->progress;          // 0 | 33 | 66 | 99 (≈100)
                            $commentsUnread  = $module->comments_unread;
                            $avgRating       = $module->avg_rating;
                            $hasCours        = $module->has_cours;
                            $hasTd           = $module->has_td;
                            $hasSolution     = $module->has_solution;
                            $lastSupportTitle= $module->last_support_title ?? null;
                            $lastSupportDate = $module->last_support_date  ?? null;
                        ?>

                        <div class="group relative rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5">
                            
                            <?php if($progress >= 99): ?>
                                <span class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-0.5 rounded-full">Minimum atteint</span>
                            <?php elseif($progress >= 33): ?>
                                <span class="absolute top-3 right-3 bg-orange-500 text-white text-xs px-2 py-0.5 rounded-full">Partiel</span>
                            <?php else: ?>
                                <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">Aucun contenu</span>
                            <?php endif; ?>

                            
                            <div class="flex items-start gap-3">
                                <div class="shrink-0 h-10 w-10 rounded-full bg-blue-600/10 flex items-center justify-center text-blue-600 text-xl">
                                    <i class="ri-book-2-line"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-base font-semibold text-gray-800 leading-snug">
                                        <?php echo e($module->nom); ?>

                                    </h3>
                                    <?php if(!empty($module->semestre)): ?>
                                        <span class="inline-block mt-1 text-[11px] px-2 py-0.5 rounded-full bg-blue-50 text-blue-700 font-medium">
                                            Semestre <?php echo e($module->semestre); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <div class="mt-4 flex flex-wrap gap-2 text-xs">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-blue-50 text-blue-700">
                                    <i class="ri-file-list-3-line text-[13px]"></i> <?php echo e($supports); ?> supports
                                </span>

                                
                                <span class="inline-flex items-center gap-1">
                                    <i class="ri-book-open-line <?php echo e($hasCours    ? 'text-green-600' : 'text-red-500'); ?>"></i>
                                    <i class="ri-pencil-ruler-2-line <?php echo e($hasTd   ? 'text-green-600' : 'text-red-500'); ?>"></i>
                                    <i class="<?php echo e($hasSolution ? 'ri-checkbox-circle-line text-green-600' : 'ri-checkbox-blank-circle-line text-red-500'); ?>"></i>
                                </span>

                                <?php if($commentsUnread): ?>
                                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-red-50 text-red-600">
                                        <i class="ri-chat-3-line text-[13px]"></i> <?php echo e($commentsUnread); ?> non lus
                                    </span>
                                <?php endif; ?>

                                <?php if(isset($avgRating)): ?>
                                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-yellow-50 text-yellow-700">
                                        <i class="ri-star-line text-[13px]"></i> <?php echo e(number_format($avgRating,1)); ?>/5
                                    </span>
                                <?php endif; ?>
                            </div>

                            
                            <div class="mt-5">
                                <div class="flex justify-between text-[11px] text-gray-500 mb-1">
                                    <span><?php echo e($progress); ?> % des types requis</span>
                                </div>
                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-600 rounded-full transition-all" style="width: <?php echo e($progress); ?>%"></div>
                                </div>
                            </div>

                            
                            <?php if($lastSupportTitle): ?>
                                <p class="mt-4 text-xs text-gray-500">
                                    Dernier support : <span class="text-gray-700"><?php echo e($lastSupportTitle); ?></span>
                                    <?php if($lastSupportDate): ?> · <?php echo e($lastSupportDate->format('d/m/Y')); ?> <?php endif; ?>
                                </p>
                            <?php endif; ?>

                            
                            <div class="mt-6 flex justify-end gap-2">
                                <a href="#"
                                   class="px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 text-sm hover:bg-blue-50 transition">
                                    Voir
                                </a>
                                <a href="#"
                                   class="px-3 py-1.5 rounded-md bg-orange-500 text-white text-sm hover:bg-orange-600 transition">
                                   + Support
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center text-gray-500 py-16">
                Aucun module assigné. Contactez l’administration.
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Enseignant.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Enseignant/MesModules/index.blade.php ENDPATH**/ ?>