<div id="previewDrawer" class="fixed inset-0 z-50 hidden">
    
    <div class="absolute inset-0 bg-black/40" onclick="closeDrawer()"></div>

    
    <div class="absolute right-0 top-0 h-full w-full sm:w-[480px] bg-white shadow-xl flex flex-col">
        <header class="px-6 py-4 flex justify-between items-center border-b">
            <h2 id="drawerTitle" class="font-semibold truncate"></h2>
            <button onclick="closeDrawer()" class="text-gray-600 hover:text-gray-800">✕</button>
        </header>

        <div class="p-6 overflow-y-auto flex-1 flex flex-col gap-6">
            
            <iframe id="drawerIframe" class="w-full h-64 sm:h-72 border" src=""></iframe>

            
            <div>
                <p class="text-sm text-gray-600 mb-2">Votre note :</p>
                <div id="starContainer" class="flex gap-1 text-2xl cursor-pointer select-none"></div>
                <button id="btnNoter" class="mt-2 bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-full text-sm hidden">Enregistrer ma note</button>
            </div>

            
            <section>
                <h3 class="font-medium mb-2">Commentaires</h3>
                <div id="commentList" class="flex flex-col gap-4"></div>

                <form id="commentForm" class="mt-3 flex flex-col gap-2">
                    <textarea id="commentText" rows="3" class="border rounded-lg p-2 resize-none" placeholder="Écrire un commentaire…" required></textarea>
                    <button class="self-end bg-primary-600 hover:bg-primary-700 text-white rounded-full px-4 py-1.5 text-sm">Publier</button>
                </form>
            </section>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Etudiant/Support/preview-drawer.blade.php ENDPATH**/ ?>