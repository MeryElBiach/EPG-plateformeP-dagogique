
<header class="mt-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
<nav x-data="{ mobile:false, user:false, ddSupports:false, ddNotif:false }" class="fixed inset-x-0 top-0 z-30">
    <div class="bg-gradient-to-r from-blue-950 via-blue-700 to-orange-500 shadow-lg">
        
        <div class="max-w-7xl mx-auto flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">

            
            <div class="flex items-center gap-2">
                <button @click="mobile=!mobile" class="md:hidden p-2 rounded hover:bg-blue-800/30 focus:outline-none">
                    <i :class="mobile ? 'ri-close-line' : 'ri-menu-line'" class="text-white text-2xl"></i>
                </button>

                <a href="#" class="flex items-center select-none">
                    <img src="<?php echo e(asset('home/assets/images/epg.png')); ?>" alt="EPG" class="h-8 w-auto">
                    <span class="ml-2 text-2xl font-extrabold text-white tracking-wide">EPG</span>
                </a>
            </div>

            
            <div class="hidden md:flex items-center gap-6 flex-1 ml-8">
                <div class="max-w-xs">
                    <input type="search" placeholder="Rechercher…"
                           class="w-56 px-4 py-2 rounded-full bg-white/90 text-gray-900 placeholder-gray-600
                                  focus:outline-none focus:ring-2 focus:ring-orange-400 transition"/>
                </div>

                <a href="<?php echo e(route('enseignant.dashboard')); ?>" class="hidden md:inline-block text-black font-medium whitespace-nowrap">Accueil</a>
                <a href="<?php echo e(route('enseignant.modules.index')); ?>" class="hidden md:inline-block text-black font-medium whitespace-nowrap">Mes Modules</a>

                
                <div x-data="{ open:false }" class="relative">
                    <button @click="open=!open" @click.away="open=false" class="hidden md:inline-block text-black font-medium whitespace-nowrap">
                        Mes Supports <i class="ri-arrow-down-s-line text-sm"></i>
                    </button>
                    <div x-show="open" x-transition.opacity
                         class="absolute left-0 mt-2 w-56 bg-white text-gray-800 rounded-lg shadow-xl overflow-hidden z-40">
                        <a href="<?php echo e(route('enseignant.supports.index')); ?>" class="block px-4 py-2 hover:bg-gray-100">Tous mes supports</a>
                        <a href="<?php echo e(route('enseignant.supports.create')); ?>" class="block px-4 py-2 hover:bg-gray-100 border-t">Déposer un support</a>
                    </div>
                </div>

                
                <div x-data="{ open:false }" class="relative">
                    <button @click="open=!open" @click.away="open=false" class="hidden md:inline-block text-black font-medium whitespace-nowrap">
                        <i class="ri-notification-3-line text-lg"></i>
                        Notifications
                        <i class="ri-arrow-down-s-line text-sm"></i>
                        
                        
                    </button>
                    <div x-show="open" x-transition.opacity
                         class="absolute left-0 mt-2 w-56 bg-white text-gray-800 rounded-lg shadow-xl overflow-hidden z-40">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Commentaires</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 border-t">Évaluations</a>
                    </div>
                </div>
            </div>

            
            <div class="flex items-center gap-2">
                <span class="hidden md:inline-block text-white font-medium whitespace-nowrap">
                    <?php echo e(Auth::user()->prenom); ?> <?php echo e(Auth::user()->nom); ?>

                </span>
                <div class="relative">
                    <button @click="user=!user" class="flex items-center p-1 rounded-full hover:bg-blue-800/30 focus:outline-none">
                        <img src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                    </button>

                    <div x-show="user" x-transition.opacity @click.away="user=false"
                         class="origin-top-right absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-xl overflow-hidden z-40">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Mon profil</a>
<form method="POST" action="<?php echo e(route('logout')); ?>">
    <?php echo csrf_field(); ?>
    <button class="block px-4 py-2 hover:bg-gray-100" type="submit">Déconnexion</button>
</form>
                    </div>
                </div>
            </div>

        </div> 
    </div>
</nav>
</header>
<?php $__env->startPush('styles'); ?>
<style>
   .nav-link { @apply font-bold text-white hover:text-orange-300 transition whitespace-nowrap; }

</style>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Enseignant/partials/nav.blade.php ENDPATH**/ ?>