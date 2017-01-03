<?php if (is_active_sidebar('sidebar-hero')): ?>
<!-- ******************* The Hero Widget Area ******************* -->
<div class="wrapper" id="wrapper-hero">
    <div class="container">

            <div id="tkhero">
                <div class="col-md-12">
                    <?php dynamic_sidebar('sidebar-hero'); ?>
                </div>
            </div>


    </div>
</div>
<?php else : ?>

<?php endif; ?>
