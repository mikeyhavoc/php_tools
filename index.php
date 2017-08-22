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
                <h2>Info</h2>
                <p>
                  Greetings, I am a retired body and fender man. I am selling off my tools now. I am located in the West Bradenton area. Sales are local only, no shipping tools.
                </p>
              </article>
              <article class="tool-info col-xs-12 col-sm-3">
                  <h2>Tool Info</h2>
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
                    <?php foreach($tools as $tool) : { ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <article>

                            <h3 class="center-text">
                            Item: <?php echo $tool['item']; ?>
                            </h3>
                            <p>
                                Tool Type: <?php echo $tool['item']; ?><br>
                                Brand: <?php echo $tool['brand']; ?><br>
                                <?php $style = implode(", ", $tool['style']); ?>
                                Style: <?php echo $style; ?> </br>
                                Retail: <?php echo $tool['retail']; ?><br>
                                Price: <?php echo $tool['price']; ?><br>
                                Description: <?php echo $tool['description']; ?><br>
                            </p>
                                <img src="<?php echo url_for('public/'. $tool['thumb']); ?>">

                        </article>
                    </div><!--/ item one -->
                    <?php } endforeach; ?><!-- end loop -->
                </div><!-- / row for container for the four items on front page.-->
            </div>

        </section>
    </div>



<?php
 require(SHARED_PATH . '/footer.php');
 ?>
