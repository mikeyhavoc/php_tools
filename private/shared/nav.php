
        <nav role="navigation" class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigationBarToggle" aria-controls="navigationBarToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navigationBarToggle">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url_for('/index.php') ?>">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" id="hand-tools" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">hand tools</a>

                        <div class="dropdown-menu" aria-labeledby="hand-tools">

                            <?php dropdown_anchor('catalog.php?cat=crimps', 'Crimps/Cutters'); ?>

                            <?php dropdown_anchor('catalog.php?cat=files', 'Files'); ?>

                            <?php dropdown_anchor('catalog.php?cat=hammers', 'Hammers'); ?>

                            <?php dropdown_anchor('catalog.php?cat=pliers', 'Pliers'); ?>

                            <?php dropdown_anchor('catalog.php?cat=bars', 'Pry & Pic Bars'); ?>

                            <?php dropdown_anchor('catalog.php?cat=ratchets', 'Ratchets'); ?>

                            <?php dropdown_anchor('catalog.php?cat=screwdrivers', 'Screwdrivers'); ?>

                            <?php dropdown_anchor('catalog.php?cat=spoons', 'Spoons');  ?>

                            <?php dropdown_anchor('catalog.php?cat=vise_grips', 'Vise Grips'); ?>

                            <?php dropdown_anchor('catalog.php?cat=wrenches', 'wrenches'); ?>

                        </div>
                    </li>
                    <li>

                        <a href="#" class="nav-link dropdown-toggle" id="tool-parts" role="button" data-toggle="dropdown" aria-hidden="false" aria-haspopup="true" aria-expanded="false">tool parts</a>
                        <div class="dropdown-menu" aria-labelledby="tool-parts">


                            <?php dropdown_anchor('catalog.php?cat=bits', 'Bits'); ?>

                            <?php dropdown_anchor('catalog.php?cat=blades', 'Blades'); ?>

                            <?php dropdown_anchor('catalog.php?cat=cables', 'Cables'); ?>

                            <?php dropdown_anchor('catalog.php?cat=chisels', 'Chisels'); ?>

                            <?php dropdown_anchor('catalog.php?cat=discs', 'Discs/Wheels'); ?>

                            <?php dropdown_anchor('catalog.php?cat=extensions', 'Extensions'); ?>

                            <?php dropdown_anchor('catalog.php?cat=sockets', 'Sockets'); ?>

                        </div>
                    </li>

                    <li class="nav-item">
                        <?php nav_anchor('catalog.php?cat=air-tools', 'Air Tools'); ?>
                    </li>

                    <li class="nav-item">
                        <?php nav_anchor('catalog.php?cat=misc', 'Misc Tools'); ?>
                    </li>

                    <li class="nav-item">
                        <?php nav_anchor('catalog.php?cat=removers', 'Removers'); ?>
                    </li>

                    <li class="nav-item">
                        <?php nav_anchor('catalog.php?cat=jacks', 'Jacks'); ?>
                    </li>

                    <li class="nav-item">
                        <?php nav_anchor('catalog.php?cat=cch', 'Clamps/Hooks/Chains'); ?>
                    </li>
                    <li class="nav-item">
                        <?php nav_anchor('/email.php', 'Contact'); ?>
                    </li>


                </ul>
            <!--    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
        </nav>
        <main role="main">