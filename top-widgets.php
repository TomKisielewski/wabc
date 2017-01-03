<?php
/**
 * @package wabc
 */
?>
<?php
  if (is_active_sidebar('sidebara') || is_active_sidebar('sidebarb') || is_active_sidebar('sidebarc') || is_active_sidebar('sidebarslideshow')) {
      ?>
<div class="wrapper" id="wrapper-top-widgets">
  <div class="container">
    <div class="">


    <?php
    if (is_active_sidebar('sidebarslideshow')) {
        ?>
    <div class="row">
    <div id="TKslideshow">
    	<div class="col-md-12 slideshow">
    		<?php dynamic_sidebar('sidebarslideshow');
        ?>
    	</div>
    </div>
    </div> <!-- end of class="row" -->
        <?php
    }
      ?>
    <div id="TKcontent" class="row">

    		<?php
            if (is_active_sidebar('sidebara') && is_active_sidebar('sidebarb') && is_active_sidebar('sidebarc')) {
                ?>
    			  <div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
              <?php dynamic_sidebar('sidebara');
                ?>
    				  </div>
    				</div>
    				<div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
    				<?php  dynamic_sidebar('sidebarb');
                ?>
    			    </div>
    				</div>
    				<div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
    				  <?php  dynamic_sidebar('sidebarc');
                ?>
    				  </div>
    				</div>


    				<?php

            } elseif (is_active_sidebar('sidebara') &&  is_active_sidebar('sidebarb') && !is_active_sidebar('sidebarc')) {
                ?>
    						  <div class="col-md-6 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebara');
                ?>
    							  </div>
    							</div>
    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarb');
                ?>
    						    </div>
    							</div>



    							<?php

            } elseif (is_active_sidebar('sidebara') &&  !is_active_sidebar('sidebarb') && !is_active_sidebar('sidebarc')) {
                ?>
    						  <div class="col-md-12 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebara');
                ?>
    							  </div>
    							</div>
    					<?php

            } elseif (!is_active_sidebar('sidebara') &&  is_active_sidebar('sidebarb') && is_active_sidebar('sidebarc')) {
                ?>

    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarb');
                ?>
    						    </div>
    							</div>
    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarc');
                ?>
    							  </div>
    							</div>


    							<?php

            } elseif (!is_active_sidebar('sidebara') &&  !is_active_sidebar('sidebarb') && is_active_sidebar('sidebarc')) {
                ?>

    							<div class="col-md-12 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarc');
                ?>
    							  </div>
    							</div>


    							<?php

            } elseif (!is_active_sidebar('sidebara') &&  is_active_sidebar('sidebarb') && !is_active_sidebar('sidebarc')) {
                ?>
    						 <div class="col-md-12 columns">
    							<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarb');
                ?>
    						  </div>
    							</div>
    						<?php

            } elseif (is_active_sidebar('sidebara') &&  !is_active_sidebar('sidebarb') && is_active_sidebar('sidebarc')) {
                ?>
    						  <div class="col-md-6 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebara');
                ?>
    							  </div>
    							</div>

    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarc');
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
<?php
  } else {
    return;
}
?>
