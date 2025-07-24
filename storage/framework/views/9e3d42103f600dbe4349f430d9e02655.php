
<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12">
  <div class="w-full max-w-lg">
    <h1 class="text-3xl font-extrabold text-center mb-8 text-blue-800">
      Déposer un support
    </h1>

    <form method="POST"
          action="<?php echo e(route('enseignant.supports.store')); ?>"
          enctype="multipart/form-data"
          class="bg-white p-8 rounded-2xl shadow-lg space-y-6">
      <?php echo csrf_field(); ?>

      
      <div>
        <label for="formation" class="block text-sm font-medium text-black">Formation</label>
        <select id="formation"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm
                       focus:border-blue-800 focus:ring-4 focus:ring-blue-200"
                required>
          <option value="">-- Choisissez une formation --</option>
          <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($f->id); ?>"><?php echo e($f->nom); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>

      
      <div>
        <label for="module" class="block text-sm font-medium text-black">Module</label>
        <select id="module" name="module_id"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm
                       focus:border-blue-800 focus:ring-4 focus:ring-blue-200"
                required>
          <option value="">-- D’abord une formation --</option>
        </select>
      </div>

      
      <div>
        <label for="element" class="block text-sm font-medium text-black">Élément</label>
        <select id="element" name="element"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm
                       focus:border-blue-800 focus:ring-4 focus:ring-blue-200"
                required>
          <option value="">-- D’abord un module --</option>
        </select>
      </div>

      
      <div>
        <label for="type" class="block text-sm font-medium text-black">Type</label>
        <select id="type" name="type"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm
                       focus:border-blue-800 focus:ring-4 focus:ring-blue-200"
                required>
          <option value="">-- Choisissez le type --</option>
          <option value="cours">Cours</option>
          <option value="td">TD</option>
          <option value="solution">Corrigé</option>
        </select>
      </div>

      
      <div>
        <label for="fichier" class="block text-sm font-medium text-black">Fichier PDF</label>
        <input type="file" id="fichier" name="fichier" accept="application/pdf"
               class="mt-1 block w-full text-gray-600
                      file:px-4 file:py-2 file:border-0
                      file:rounded-lg file:bg-blue-50 file:text-blue-800
                      hover:file:bg-blue-100"
               required>
      </div>

      <button type="submit"
              class="w-full py-3 font-semibold text-white rounded-lg
                     bg-blue-800 hover:bg-blue-900
                     shadow-md transition-opacity">
        Enregistrer
      </button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  // JSON préparé côté contrôleur
  const modulesData = <?php echo $modulesJs; ?>;

  const selFormation = document.getElementById('formation');
  const selModule    = document.getElementById('module');
  const selElement   = document.getElementById('element');

  // 1) Renseigner les modules de l’enseignant pour la formation choisie
  selFormation.addEventListener('change', () => {
    const fid = parseInt(selFormation.value, 10);
    selModule.innerHTML = '<option value="">-- Sélectionnez un module --</option>';
    selElement.innerHTML = '<option value="">-- D’abord un module --</option>';

    modulesData
      .filter(m => m.formation === fid)
      .forEach(m => {
        const opt = document.createElement('option');
        opt.value       = m.id;
        opt.textContent = m.name;
        selModule.appendChild(opt);
      });
  });

  // 2) Renseigner les éléments de l’élément choisi
  selModule.addEventListener('change', () => {
    const mid = parseInt(selModule.value, 10);
    selElement.innerHTML = '<option value="">-- Sélectionnez un élément --</option>';

    const mod = modulesData.find(m => m.id === mid);
    if (!mod) return;

    mod.elements.forEach(el => {
      const opt = document.createElement('option');
      opt.value       = el;
      opt.textContent = el;
      selElement.appendChild(opt);
    });
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Enseignant.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Enseignant/Supports/create.blade.php ENDPATH**/ ?>