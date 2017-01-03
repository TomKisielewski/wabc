<?php
/**
 * @package wabc
 */
?>

<?php if (is_active_sidebar('sidebarfa') || is_active_sidebar('sidebarfb') || is_active_sidebar('sidebarfc')) {
    ?>

<div class="" id="wrapper-footer-widgets">
  <div class="container">
    <div class="">



    <div id="TKfootercontent" class="row">


    			<?php
            if (is_active_sidebar('sidebarfa') && is_active_sidebar('sidebarfb') && is_active_sidebar('sidebarfc')) {
                ?>
    			  <div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
              <?php dynamic_sidebar('sidebarfa');
                ?>
    				  </div>
    				</div>
    				<div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
    				<?php  dynamic_sidebar('sidebarfb');
                ?>
    			    </div>
    				</div>
    				<div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
    				  <?php  dynamic_sidebar('sidebarfc');
                ?>
    				  </div>
    				</div>


    				<?php

            } elseif (is_active_sidebar('sidebarfa') &&  is_active_sidebar('sidebarfb') && !is_active_sidebar('sidebarfc')) {
                ?>
    						  <div class="col-md-6 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebarfa');
                ?>
    							  </div>
    							</div>
    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarfb');
                ?>
    						    </div>
    							</div>



    							<?php

            } elseif (is_active_sidebar('sidebarfa') &&  !is_active_sidebar('sidebarfb') && !is_active_sidebar('sidebarfc')) {
                ?>
    						  <div class="col-md-12 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebarfa');
                ?>
    							  </div>
    							</div>
    					<?php

            } elseif (!is_active_sidebar('sidebarfa') &&  is_active_sidebar('sidebarfb') && is_active_sidebar('sidebarfc')) {
                ?>

    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarfb');
                ?>
    						    </div>
    							</div>
    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarfc');
                ?>
    							  </div>
    							</div>


    							<?php

            } elseif (!is_active_sidebar('sidebarfa') &&  !is_active_sidebar('sidebarfb') && is_active_sidebar('sidebarfc')) {
                ?>

    							<div class="col-md-12 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarfc');
                ?>
    							  </div>
    							</div>


    							<?php

            } elseif (!is_active_sidebar('sidebarfa') &&  is_active_sidebar('sidebarfb') && !is_active_sidebar('sidebarfc')) {
                ?>
    						 <div class="col-md-12 columns">
    							<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarfb');
                ?>
    						  </div>
    							</div>
    						<?php

            } elseif (is_active_sidebar('sidebarfa') &&  !is_active_sidebar('sidebarfb') && is_active_sidebar('sidebarfc')) {
                ?>
    						  <div class="col-md-6 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebarfa');
                ?>
    							  </div>
    							</div>

    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarfc');
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
