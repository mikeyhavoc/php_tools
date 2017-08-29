<?php require_once('private/initialize.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 7/13/17
 * Time: 5:47 AM
 */
// dummy data testing !! take out for database later
require(PRIVATE_PATH . '/dum_data.php');
// !! future removal


require(SHARED_PATH . '/header.php');
require(SHARED_PATH . '/nav.php');

?>
    <div class="container-fluid">
        <div class="row">
            <section>
              <article class="info col-xs-12 col-sm-3 col-sm-offset-3">
                <h2 class="text-center">Info</h2>
                <p>
                  Greetings, I am a retired body and fender man. I am selling off my tools now. I am located in the West Bradenton area. Sales are local only, no shipping tools.
                </p>
              </article>
              <article class="tool-info col-xs-12 col-sm-3">
                  <h2 class="text-center">Tool Info</h2>
                  <p>
                    Important to note:
                    <ul>
                      <li>Generally <em>most</em> of these items there is only one of said item.</li>
                      <li>if any questions about an Item please email</li>
                      <li>listing will be updated asap after sales occur</li>
                    </ul>
              </article>
            </section><!--article section -->
       </div><!-- / row -->
    </div><!--/ container-fluid-->
    <div class="container-fluid">
        <section class="tools-display">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <article class="card">

                            <h3 class="text-center">Wrenches</h3>
                            <p class="text-center">
                                Tool Type: Mostly wrench sets some singles.<br>
                            </p>
                                <img class="center-block img-responsive img-thumbnail" src="<?php echo url_for(  IMAGES . '/images/med_img/wrench/a2_wrench.jpg'); ?>" >

                        </article>
                    </div><!--/ item one -->

                </div><!-- / row for container for the three items on front page.-->
            </div>

        </section>
        <section class="tools-display">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <article class="card">

                            <h3 class="text-center"></h3>
                            <p class="text-center">
                                Tool Type: <br>


                            </p>
                            <img class="center-block" src="">

                        </article>
                    </div><!--/ item one -->

                </div><!-- / row for container for the three items on front page.-->
            </div>

        </section>
        <section class="tools-display">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <article class="card">

                            <h3 class="text-center"></h3>
                            <p class="text-center">
                                Tool Type: <br>


                            </p>
                            <img class="center-block" src="">

                        </article>
                    </div><!--/ item one -->

                </div><!-- / row for container for the three items on front page.-->
            </div>

        </section>
    </div>
    <section>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >Trial One</button>
    </section>





<?php
 require(SHARED_PATH . '/footer.php');
 ?>
