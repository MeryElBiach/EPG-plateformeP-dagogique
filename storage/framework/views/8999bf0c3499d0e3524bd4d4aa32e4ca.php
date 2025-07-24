

<?php $__env->startSection('title', 'Tableau de bord Enseignant'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 pt-8 pb-12 space-y-10">

    
    <header class="relative space-y-2">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Bonjour, Pr. <?php echo e($teacher->prenom); ?> <?php echo e($teacher->nom); ?>

            </h1>
            <br>
            <p class="text-sm text-gray-600 font-semibold">
                Voici l’activité liée à vos supports aujourd’hui.
            </p>
        </div>

        <a href=""
           class="absolute top-0 right-0 inline-flex items-center gap-2 px-5 py-2
                  rounded-md text-white bg-blue-600 hover:bg-blue-700 shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Déposer un support
        </a>
    </header>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        
        <div class="kpi-card flex items-center gap-4 bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <svg class="w-8 h-8 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 2h8l4 4v14a2 2 0 01-2 2H8a2 2 0 01-2-2V4a2 2 0 012-2z"/>
            </svg>
            <div>
                <p class="kpi-text text-xs uppercase text-gray-500">Supports publiés</p>
                <p class="kpi-text mt-1 text-2xl font-bold"><?php echo e($supportsCount); ?></p>
            </div>
        </div>

        
        <div class="kpi-card flex items-center gap-4 bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <svg class="w-8 h-8 text-teal-500 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17 8H3a1 1 0 00-1 1v7l3-3h12a1 1 0 001-1V9a1 1 0 00-1-1z"/>
            </svg>
            <div>
                <p class="kpi-text text-xs uppercase text-gray-500">Commentaires reçus</p>
                <p class="kpi-text mt-1 text-2xl font-bold text-gray-800"><?php echo e($commentsCount); ?></p>
            </div>
        </div>

        
        <div class="kpi-card flex items-center gap-4 bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <svg class="w-8 h-8 text-yellow-400 shrink-0" fill="currentColor" viewBox="0 0 24 24">
               <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22
                        12 18.27 5.82 22 7 14.14l-5-4.87 6.91-1.01L12 2z"/>
            </svg>
            <div>
                <p class="kpi-text text-xs uppercase text-gray-500">Note ★ moyenne</p>
                <p class="kpi-text mt-1 text-2xl font-bold text-gray-800"><?php echo e($avgRating ?? '—'); ?></p>
            </div>
        </div>

        
        <div class="kpi-card flex items-center gap-4 bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <svg class="w-8 h-8 text-gray-500 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 6v6l4 2m-4-10a8 8 0 100 16 8 8 0 000-16z"/>
            </svg>
            <div>
                <p class="kpi-text text-xs uppercase text-gray-500">Dernier support</p>
                <p class="kpi-text mt-1 text-2xl font-bold text-gray-800">
                    <?php echo e($lastSupport?->created_at?->format('d/m') ?? '—'); ?>

                </p>
                <?php if($lastSupport): ?>
                    <p class="kpi-text text-xs text-gray-500 truncate max-w-[10rem]">
                        <?php echo e($lastSupport->titre); ?>

                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <section class="space-y-4">
        <h2 class="text-lg font-semibold text-blue-700">
            Formations concernées (<?php echo e(now()->year); ?>)
        </h2>

        <?php $__empty_1 = true; $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex items-center justify-between bg-gray-50 border-l-4 border-blue-600
                        rounded-r-lg p-4">
                <span class="font-semibold text-gray-800"><?php echo e($f->nom); ?></span>
                <span class="text-sm text-gray-600"><?php echo e($f->modules_count); ?> modules</span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-400">Aucune formation attribuée.</p>
        <?php endif; ?>
    </section>

    
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <h3 class="text-md font-semibold text-gray-800 mb-4">Derniers supports déposés</h3>
            <ul class="space-y-3 text-sm">
                <?php $__empty_1 = true; $__currentLoopData = $recentSupports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="flex justify-between">
                        <span class="truncate"><?php echo e($s->titre); ?></span>
                        <span class="text-gray-500"><?php echo e($s->created_at->format('d/m')); ?></span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="text-gray-400">— Aucun support récent —</li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <h3 class="text-md font-semibold text-gray-800 mb-4">Derniers commentaires</h3>
            <ul class="space-y-3 text-sm">
                <?php $__empty_1 = true; $__currentLoopData = $recentComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="flex justify-between">
                        <span class="truncate"><?php echo e(Str::limit($c->contenu, 40)); ?></span>
                        <span class="text-gray-500"><?php echo e($c->created_at->format('d/m')); ?></span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="text-gray-400">— Aucun commentaire récent —</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>
  <!-- pensez a faire un to do liste  -->
    
    <section class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-md font-semibold text-gray-800 mb-4">À faire</h3>
        <ul class="space-y-3 text-sm" id="todo-list">
            <?php $__empty_1 = true; $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="flex items-center gap-2">
                    <input type="checkbox" class="todo-checkbox rounded text-green-600">
                    <span>
                        Déposer le fichier pour
                        <span class="font-medium"><?php echo e($t->titre); ?></span>
                    </span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="text-gray-400">Aucune tâche pour le moment.</li>
            <?php endif; ?>
        </ul>
    </section>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
:root{
    --epg-brown: #d9792b;         /* plus clair */
    --epg-brown-hover:#c86a1f;    /* optionnel si tu veux une nuance différente */
}
.kpi-card{
    transition: transform .2s ease-out,
                box-shadow .2s ease-out,
                background-color .2s ease-out,
                color .2s ease-out;
    position: relative;
    overflow: hidden;
    border-radius: 0.5rem; /* pour que ::before suive */
}
.kpi-card:hover{
    transform: translateY(-4px) scale(1.03);
    box-shadow: 0 8px 16px rgba(0,0,0,.15);
}

/* couche colorée indépendante pour le fond */
.kpi-card::before{
    content:"";
    position:absolute;
    inset:0;
    background: var(--epg-brown);
    opacity:0;
    transition: opacity .2s ease-out;
    z-index:0;
    border-radius: inherit;
}
.kpi-card:hover::before{
    opacity:1;
}

/* contenu au-dessus */
.kpi-card > *{
    position: relative;
    z-index:1;
}

/* textes à blanchir (icônes NON affectées) */
.kpi-card:hover .kpi-text{
    color:#fff;
}

/* garde la couleur des icônes telle que définie dans le HTML */
.kpi-card svg{
    position: relative;
    z-index:1;
}

/* optionnel: éclaircir le texte secondaire au hover */
.kpi-card:hover .kpi-text.text-gray-500{
    color: rgba(255,255,255,.8);
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
/* Tu peux ajouter des interactions JS ici plus tard */
</script>
<?php $__env->stopPush(); ?>
<!-- │ [ Total : 42 ] [ Cours : 20 ] [ TD : 15 ] [ Corrigés : 7 ]│ -->
<?php echo $__env->make('Enseignant.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Enseignant/dash.blade.php ENDPATH**/ ?>