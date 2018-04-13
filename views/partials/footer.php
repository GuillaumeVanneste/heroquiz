<?php
include 'includes/callApi.php';
?>





</main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Le Saviez-vous?</h5>
                    <p class="grey-text text-lighten-4"><?= $sentence ?></p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="index.php?link=<?php if(empty($_SESSION['username'])) : ?>signin<?php else : ?>question<?php endif; ?>">Accéder au quiz</a></li>
                        <li><a class="grey-text text-lighten-3" href="index.php?link=leaderboard">Leaderboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2018 Copyright - All rights reserved
            </div>
        </div>
    </footer>

    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/materialize.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>