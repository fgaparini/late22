 </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap/docs/assets/js/bootstrap-typeahead.js"></script>
    <?php if (isset($js)): ?>
        <?php foreach ($js as $var): ?>
            <script type="text/javascript" src="<?php echo base_url() . $var ?>.js"></script>
        <?php endforeach; ?>
    <?php endif; ?>

  </body>
</html>