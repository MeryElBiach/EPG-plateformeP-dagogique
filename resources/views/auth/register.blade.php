<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Prénom -->
        <div>
            <label for="prenom">Prénom</label>
            <input id="prenom" class="block mt-1 w-full" type="text" name="prenom" value="{{ old('prenom') }}" required autofocus>
            @error('prenom') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Nom -->
        <div class="mt-4">
            <label for="nom">Nom</label>
            <input id="nom" class="block mt-1 w-full" type="text" name="nom" value="{{ old('nom') }}" required>
            @error('nom') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mt-4">
            <label for="email">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Rôle -->
        <div class="mt-4">
            <label for="role">Rôle</label>
            <select id="role" name="role" class="block mt-1 w-full text-black bg-white border border-gray-300 rounded-md shadow-sm" required>
                <option value="">-- Choisir un rôle --</option>
                <option value="etudiant">Étudiant</option>
                <option value="enseignant">Enseignant</option>
            </select>
            @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Formation (affiché seulement si role = etudiant) -->
        <div class="mt-4" id="formation-section" style="display: none;">
            <label for="formation_id">Formation</label>
            <select id="formation_id" name="formation_id" class="block mt-1 w-full">
                <option value="">-- Sélectionner une formation --</option>
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                @endforeach
            </select>
            @error('formation_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Avatar -->
        <div class="mt-4">
            <label for="avatar">Photo de profil</label>
            <input id="avatar" type="file" name="avatar" class="block mt-1 w-full">
            @error('avatar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Mot de passe -->
        <div class="mt-4">
            <label for="password">Mot de passe</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="mt-4">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required>
        </div>

        <!-- Bouton -->
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">S’inscrire</button>
        </div>
    </form>

    <!-- JS pour afficher/masquer la section formation -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const formationSection = document.getElementById('formation-section');

            function toggleFormationSection() {
                formationSection.style.display = (roleSelect.value === 'etudiant') ? 'block' : 'none';
            }

            roleSelect.addEventListener('change', toggleFormationSection);
            toggleFormationSection(); // initialisation
        });
    </script>
</x-guest-layout>
