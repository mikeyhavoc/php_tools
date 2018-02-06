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
                    Hi I am Gary and have been working in body shops over 40 years.
                    I have been in local <em>Bradenton</em> shops for about 25 years. I am <em>selling
                    off my tools</em>.<br> If you are interested I can provide work place references.
                    <br>These tools are my own tools, not selling other peoples tools for them so <em>do not ask</em>.
                   Also, These are mostly <strong>American made tools</strong>, All still usable, many are lightly used,
                    some even new.


                </p>
              </article>
              <article role="article" class="tool-info col-12 col-sm-6">
                  <h2 class="text-center">Tool Info</h2>
                  <p>Important to note:</p>
                    <ul role="list">
                      <li>Generally <em>most</em> of these items there is only one of said item.</li>
                      <li>if any questions about an Item please email</li>
                      <li>listing will be updated asap after sales occur</li>
                      <li>Sales are local only</li>
                      <li>No Shipping Tools</li>
                    </ul>
              </article>
            </section>
        </div>
        <div class="container-fluid">
            <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <article role="article" class="card">

                            <h2 class="text-center">
                                <a class="btn btn-lg btn-outline-danger" href="<?php echo url_for( 'catalog.php?cat=sockets'); ?>" >
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
                                        <a class="btn btn-lg btn-outline-danger" href="<?php echo url_for( 'catalog.php?cat=wrenches'); ?>" >
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
                                    <a class="btn btn-lg btn-outline-danger" href="<?php echo url_for( 'catalog.php?cat=air-tools'); ?>" >
                                        Air Tools
                                    </a>
                                </h3>
                                <p class="text-center">
                                        Tool Type: Air drills, etc.<br>
                                </p>
                                    <a href="<?php echo url_for( 'catalog.php?cat=air-tools'); ?>">
                                        <img class="catalog-images center-block img-rounded" src="<?php echo  IMAGES . '/img/air/b48-air.jpg'; ?>" >
                                    </a>
                                </article>
                            </div>
        </div>
    </div>

<?php
 require(SHARED_PATH . '/footer.php');
 ?>
