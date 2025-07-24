<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <title><?php echo $__env->yieldContent('title', 'Tableau de bord Enseignant'); ?></title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js -->
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>">

  
  <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-gray-100 font-sans antialiased">
  <?php echo $__env->make('Enseignant.partials.nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <?php echo $__env->yieldContent('content'); ?>
  </main>

  
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Enseignant/layout.blade.php ENDPATH**/ ?>