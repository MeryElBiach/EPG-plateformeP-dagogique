<footer>
  <section class="contact" id="contact" style="position: relative; color: white; min-height: 400px;">
    <div style="
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background:url('{{ asset('home/assets/images/back.jpg') }}')  center/cover no-repeat;
      filter: blur(3px);
      opacity: 0.85;
      z-index: -1;">
    </div>
    <!-- contenu ici -->

    <div style="backdrop-filter: blur(5px); padding: 40px 20px;">
      <div class="main-contact" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px;">

        <!-- A Propos -->
        <div class="contact-content" style="flex: 1 1 250px;">
          <h3>À propos de l’école</h3>
          <p style="margin-top: 15px;">
            L’École Polytechnique des Génies est un centre d’excellence en informatique, cybersécurité, gestion de projet et plus encore. Nous accompagnons les étudiants avec des cursus professionnalisants et des ressources pédagogiques accessibles.
          </p>
        </div>

        <!-- Contact -->
        <div class="contact-content" style="flex: 1 1 250px;">
          <h3>Contact</h3>
           <br>
          <p><strong>Adresse :</strong><br>
            22, Rue Mohammed El Hayani, V.N Fès – Maroc<br>
            4ème étage, Appt 20 Imm Hazzaz
          </p>
           <br>
          <p><strong>Email :</strong> <a href="mailto:contact@epg.ma" style="color: #00e1ff;">contact@epg.ma</a></p>
           <br>
          <p><strong>Téléphone :</strong> (+212) 06 19 08 66 66</p>
        </div>

        <!-- Services -->
        <div class="contact-content" style="flex: 1 1 250px;">
          <h3>Nos services</h3>
          <br>
          <ul style="list-style: none; padding: 0;">
            <li>✔ Formations certifiantes</li>
            <li>✔ Cours de soutien</li>
            <li>✔ Développement web &amp; mobile</li>
            <li>✔ Sécurité des systèmes</li>
          </ul>
        </div>

        <!-- Réseaux sociaux -->
        <div class="contact-content" style="flex: 1 1 250px;">
          <h3>Réseaux sociaux</h3>
          <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 10px;">
            <a href="https://www.instagram.com/explore/locations/867954669911929/competence-center/" target="_blank" style="color: #E1306C;">
              <i class="fab fa-instagram fa-lg"></i> Instagram
            </a>
            <a href="https://www.facebook.com/competencecenter.ma" target="_blank" style="color: #1877F2;">
              <i class="fab fa-facebook fa-lg"></i> Facebook
            </a>
            <a href="mailto:contact@epg.ma" style="color: #ea4335;">
              <i class="fas fa-envelope fa-lg"></i> Gmail
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <hr style="margin: 0;">

  <div class="foot" style="background-color: white ; color: black ; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
    <div class="last-text">
      <p>© 2023/2024 École Polytechnique des Génies – Tous droits réservés</p>
    </div>
    <div class="upBtn">
      <button onclick="topFunction()" title="Retour en haut" style="background: none; border: none;">
        <i class="fas fa-chevron-circle-up fa-2x" style="color:rgb(237, 142, 8);"></i>
      </button>
    </div>
  </div>
</footer>