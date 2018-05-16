</main>
<a type="button" role="button" class="btn btn-lg btn-outline-primary" href="#top">Top</a>
<footer role="footer">
    <p>Created by Michael Williams, &copy;2017  last update <?php echo DATE("d, m, Y H:i:s.", getlastmod()); ?></p>

</footer>
<script  src="<?php echo node_module("node_modules/jquery/dist/jquery.min.js");?>"></script>
<script  src="<?php echo url_for("node_modules/popper.js/dist/popper.js");?>"></script>
<script  src="<?php echo url_for("node_modules/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
<script  src="<?php echo url_for( 'public/js/main.js');  ?>"></script>
</body>
</html>
