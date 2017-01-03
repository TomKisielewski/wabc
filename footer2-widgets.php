<?php
/**
 * @package wabc
 */
?>
<div class="" id="wrapper-footer2-widgets">
  <div class="container">
    <div class="">



    <div id="TKfooter2content" class="row">

    		<?php if (!is_active_sidebar('sidebarf2a') && !is_active_sidebar('sidebarf2b') && !is_active_sidebar('sidebarf2c')) {
    ?>

    			<?php

} elseif (is_active_sidebar('sidebarf2a') && is_active_sidebar('sidebarf2b') && is_active_sidebar('sidebarf2c')) {
    ?>
    			  <div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
              <?php dynamic_sidebar('sidebarf2a');
    ?>
    				  </div>
    				</div>
    				<div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
    				<?php  dynamic_sidebar('sidebarf2b');
    ?>
    			    </div>
    				</div>
    				<div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
    				  <?php  dynamic_sidebar('sidebarf2c');
    ?>
    				  </div>
    				</div>


    				<?php

} elseif (is_active_sidebar('sidebarf2a') &&  is_active_sidebar('sidebarf2b') && !is_active_sidebar('sidebarf2c')) {
    ?>
    						  <div class="col-md-6 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebarf2a');
    ?>
    							  </div>
    							</div>
    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarf2b');
    ?>
    						    </div>
    							</div>



    							<?php

} elseif (is_active_sidebar('sidebarf2a') &&  !is_active_sidebar('sidebarf2b') && !is_active_sidebar('sidebarf2c')) {
    ?>
    						  <div class="col-md-12 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebarf2a');
    ?>
    							  </div>
    							</div>
    					<?php

} elseif (!is_active_sidebar('sidebarf2a') &&  is_active_sidebar('sidebarf2b') && is_active_sidebar('sidebarf2c')) {
    ?>

    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarf2b');
    ?>
    						    </div>
    							</div>
    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarf2c');
    ?>
    							  </div>
    							</div>


    							<?php

} elseif (!is_active_sidebar('sidebarf2a') &&  !is_active_sidebar('sidebarf2b') && is_active_sidebar('sidebarf2c')) {
    ?>

    							<div class="col-md-12 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarf2c');
    ?>
    							  </div>
    							</div>


    							<?php

} elseif (!is_active_sidebar('sidebarf2a') &&  is_active_sidebar('sidebarf2b') && !is_active_sidebar('sidebarf2c')) {
    ?>
    						 <div class="col-md-12 columns">
    							<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarf2b');
    ?>
    						  </div>
                </div>
    						<?php

} elseif (is_active_sidebar('sidebarf2a') &&  !is_active_sidebar('sidebarf2b') && is_active_sidebar('sidebarf2c')) {
    ?>
    						  <div class="col-md-6 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebarf2a');
    ?>
    							  </div>
    							</div>

    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarf2c');
    ?>
    							</div>
    							</div>


    							<?php

}
                    ?>

    	</div>




   </div>
  </div>
</div>
