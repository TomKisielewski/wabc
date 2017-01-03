<div id="middle-widgets-wrapper">
<div class="container">
  <div class="">



    <div id="TKMiddlecontent" class="row">

        <?php if (!is_active_sidebar('sidebarmd1') && !is_active_sidebar('sidebarmd2')) {
    ?>
        <?php

} elseif (is_active_sidebar('sidebarmd1') && is_active_sidebar('sidebarmd2')) {
    ?>
          <div class="col-sm-6 col-md-6 columns">
            <div class="tk-block">
            <?php dynamic_sidebar('sidebarmd1');
    ?>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 columns">
            <div class="tk-block">
          <?php  dynamic_sidebar('sidebarmd2');
    ?>
            </div>
          </div>



          <?php

} elseif (is_active_sidebar('sidebarmd1') &&  !is_active_sidebar('sidebarmd2')) {
              ?>
                <div class="col-md-12 columns">
                  <div class="tk-block">
                  <?php dynamic_sidebar('sidebarmd1');
              ?>
                  </div>
                </div>
            <?php

          } elseif (!is_active_sidebar('sidebarmd1') &&  is_active_sidebar('sidebarmd2')) {
              ?>

                <div class="col-md-12 columns">
                  <div class="tk-block">
                <?php  dynamic_sidebar('sidebarmd2');
              ?>
                  </div>
                </div>

            <?php

          }
            ?>

      </div>




 </div>
</div>
</div> <!-- end of middle-widget wrapper -->
