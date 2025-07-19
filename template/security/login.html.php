
    <div class="bg-white rounded-3xl shadow-xl p-8 w-full max-w-md mx-4">

       
        <!-- Logo/Titre -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-blue-600 mb-6">MAXITSA</h1>
            <h2 class="text-xl font-semibold text-black mb-8">BIENVENUE SUR MAXIT SA</h2>
        </div>
        
        <!-- Affichage des erreurs globales -->
        <?php if (isset($errors['globalErrors'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($errors['globalErrors']) ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire de connexion -->
        <form method="POST" action="/login" class="space-y-6">
            <?php if (isset($_GET['expired'])): ?>
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
                    Votre session a expiré. Veuillez vous reconnecter.
                </div>
            <?php endif; ?>

            <!-- Champ numéro de téléphone ou email -->
            <div>
                <input 
                    type="text" 
                    name="login"
                    value="<?= htmlspecialchars($login ?? '') ?>"
                    placeholder="Login"
                    class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-500"
                >
                <?php if (isset($errors['login'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars(is_array($errors['login']) ? implode(', ', $errors['login']) : $errors['login']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Champ mot de passe -->
            <div>
                <input 
                    type="password" 
                    name="password"
                    placeholder="MOT DE PASSE"
                    class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-500"
                >
                <?php if (isset($errors['password'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars(is_array($errors['password']) ? implode(', ', $errors['password']) : $errors['password']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Bouton de connexion -->
            <button 
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-xl transition duration-200 ease-in-out transform hover:scale-105"
            >
                Se connecter
            </button>
        </form>

        <!-- Liens supplémentaires -->
        <div class="text-center mt-8 space-y-4">
            <a href="#" class="block text-blue-600 hover:text-blue-800 text-sm transition duration-200">
                Mot de passe oublié ?
            </a>
            <a href="/creer-compte" class="block text-blue-600 hover:text-blue-800 text-sm transition duration-200">
                Créer un compte principal
            </a>
        </div>
    </div>


