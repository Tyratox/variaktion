<?php wp_footer(); ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 logo">
                <?php echo file_get_contents(locate_template("img/191228_logo_max.svg")); ?>
            </div>
            <div class="col-12 d-sm-none">
                <hr />
            </div>
            <div class="col-12 col-md-4">
                <ul class="footer-list">
                    <li>
                        <a href="https://instagram.com/variaktion" target="_blank"><i class="fab fa-instagram"></i>
                            <div><span>Instagram</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="/info" target="_blank"><i class="fa fa-info"></i>
                            <div><span>Infos und Impressum</span></div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 d-sm-none">
                <hr />
            </div>
            <div class="col-12 col-md-4">
                <h2>Spenden</h2>
                <div class="address">
                    <p>
                        IBAN: CH06 0076 1648 8273 6200 1
                    </p>
                    <p>Verein Jugendkulturfestival Variaktion</p>
                    <p>c/o Jugendkulturhaus Flösserplatz</p>
                    <p>Flösserstrasse 7</p>
                    <p>5000 Aarau</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>