<?php require_once('private/initialize.php'); ?>
<?php
$section = null;
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 7/13/17
 * Time: 5:47 AM
 */

$page_title = 'Gary\'s Tool Site';

require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');

?>
    <div class="container-fluid">

        <div class="row">
            <section class="mobile-s">
              <article role="article" class="info col-12 col-sm-6 ">
                <h2 class="text-center">Info</h2>
                <p class="text-left">
                  Greetings, I am a retired body and fender man. I am selling off my tools now. I am located in the Bradenton area. Sales are local only, no shipping tools.
                </p>
              </article>
              <article role="article" class="tool-info col-12 col-sm-6">
                  <h2 class="text-center">Tool Info</h2>
                  <p>Important to note:</p>
                    <ul role="list">
                      <li>Generally <em>most</em> of these items there is only one of said item.</li>
                      <li>if any questions about an Item please email</li>
                      <li>listing will be updated asap after sales occur</li>
                    </ul>
              </article>
            </section>
        </div>
        <div class="container-fluid">
            <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <article role="article" class="card">

                            <h2 class="text-center">
                                <a class="btn btn-lg btn-danger" href="<?php echo url_for( 'catalog.php?cat=sockets'); ?>" >
                                    Sockets
                                </a>
                            </h2>
                            <p class="text-center">
                                Tool Type: Sockets.<br>
                            </p>
                            <a href="<?php echo url_for( 'catalog.php?cat=sockets'); ?>">
                                <img class="catalog-images center-block img-responsive img-rounded" src="<?php echo  IMAGES . '/img/socket/i322-socket-1.jpg'; ?>" >
                            </a>
                        </article>
                    </div><!--/ item one -->
                        <div class="col-sm-6 col-md-4">
                                <article role="article" class="card">

                                    <h3 class="text-center">
                                        <a class="btn btn-lg btn-danger" href="<?php echo url_for( 'catalog.php?cat=wrenches'); ?>" >
                                            Wrenches
                                        </a>
                                    </h3>
                                    <p class="text-center">
                                        Tool Type: Mostly wrench sets some singles.<br>
                                    </p>
                                    <a href="<?php echo url_for( 'catalog.php?cat=wrenches'); ?>">
                                        <img class="catalog-images center-block img-responsive img- img-rounded" src="<?php echo IMAGES . '/img/wrench/a2-wrench.jpg'; ?>" >
                                    </a>
                                </article>
                        </div><!--/ item one -->



                            <div class="col-sm-6 col-md-4">
                                <article role="article" class="card">

                                <h3 class="text-center">
                                    <a class="btn btn-lg btn-danger" href="<?php echo url_for( 'catalog.php?cat=air_tools'); ?>" >
                                        Air Tools
                                    </a>
                                </h3>
                                <p class="text-center">
                                        Tool Type: Air drills, etc.<br>
                                </p>
                                    <a href="<?php echo url_for( 'catalog.php?cat=air_tools'); ?>">
                                        <img class="catalog-images center-block img-rounded" src="<?php echo  IMAGES . '/img/air/b48-air.jpg'; ?>" >
                                    </a>
                                </article>
                            </div>
        </div>
    </div>

<?php
 require(SHARED_PATH . '/footer.php');
 ?>
