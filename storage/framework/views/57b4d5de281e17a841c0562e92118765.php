<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['support']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['support']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php
    // Génère les couleurs en fonction du type
    $colors = [
        'cours'    => ['bg' => 'bg-blue-100',   'text' => 'text-blue-700'],
        'td'       => ['bg' => 'bg-amber-100',  'text' => 'text-amber-700'],
        'solution' => ['bg' => 'bg-emerald-100','text' => 'text-emerald-700'],
    ];
    $c = $colors[$support->type] ?? $colors['cours'];
?>

<div class="bg-white rounded-2xl shadow p-5 flex flex-col gap-4" data-support="<?php echo e($support->id); ?>">
    <div class="flex items-center gap-3">
        <span class="px-3 py-1 text-xs font-semibold rounded-full <?php echo e($c['bg']); ?> <?php echo e($c['text']); ?>">
            <?php echo e(strtoupper($support->type)); ?>

        </span>
        <h3 class="font-medium truncate" title="<?php echo e($support->titre); ?>"><?php echo e($support->titre); ?></h3>
    </div>

    <p class="text-sm text-gray-500">Déposé le <?php echo e($support->created_at->format('d/m/Y')); ?></p>

    <div class="text-sm text-gray-500 flex gap-4">
        <span>👁 <?php echo e($support->views); ?></span>
        <span>⬇ <?php echo e($support->downloads); ?></span>
        <span>★ <?php echo e(number_format($support->evaluations_avg_valeur,1)); ?></span>
    </div>

    <div class="mt-auto flex justify-end gap-2">
        <button class="btn-outline-preview px-4 py-1.5 text-sm border rounded-full" data-open-preview
            data-id="<?php echo e($support->id); ?>"
            data-title="<?php echo e($support->titre); ?>"
            data-type="<?php echo e($support->type); ?>"
            data-created="<?php echo e($support->created_at->format('d/m/Y')); ?>"
            data-preview-url="<?php echo e(route('etudiant.support.preview', $support->id)); ?>"
            data-download-url="<?php echo e(route('etudiant.support.download', $support->id)); ?>"
            data-user-note="<?php echo e($support->user_note ?? 0); ?>"
            data-avg-note="<?php echo e(number_format($support->evaluations_avg_valeur,1)); ?>">
            Aperçu
        </button>
        <a href="<?php echo e(route('etudiant.support.download', $support)); ?>" class="bg-primary-600 hover:bg-primary-700 text-white text-sm rounded-full px-4 py-1.5">Télécharger</a>
    </div>
</div><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/components/support-card.blade.php ENDPATH**/ ?>