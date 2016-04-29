    <div id="footer">
    	<div id="footerTop">
        	<div class="container">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <?php if ( dynamic_sidebar('footer-signup') ) : else : endif; ?>
		    <form method="post" action="http://foodbusinessschool.org/newsletter/">
		        <div class="input-group">
                      	    <input type="text" name="join_email" class="form-control" placeholder="Email...">
                      	    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Send</button>
                     	    </span>
		        </div><!-- /input-group -->
		    </form>
                </div><!-- /.col-lg-6 -->
            </div>
        </div>
    	<div id="footerBottom">
        	<div class="container">
            	<div class="row">
                    <!-- Widget Area One -->
					<?php if ( dynamic_sidebar('footer_1') ) : else : endif; ?>
                    
                    <!-- Widget Area Two -->
                    <?php if ( dynamic_sidebar('footer_2') ) : else : endif; ?>
                    
                    <!-- Widget Area Three -->
                    <?php if ( dynamic_sidebar('footer_3') ) : else : endif; ?>
                    
                    <!-- Widget Area Four -->
                    <?php if ( dynamic_sidebar('footer_4') ) : else : endif; ?>
                </div>
                <div class="row" id="corporatePartners">
                	<div class="col-md-12">
                    	<!-- Corporate Partners -->
						<?php if ( dynamic_sidebar('corp_partners') ) : else : endif; ?>
                    </div>
                </div>
            </div>
        </div>
	<div id="belowFooter">
	    <div class="container">
		<?php if ( dynamic_sidebar('disclaimer-links') ) : else : endif; ?>
	    </div>
	</div>
    </div>
	
    </div><!-- End SideBar Container -->
    
    <!-- Mobile Slider Nav -->
    <div class="sb-slidebar sb-right sb-style-push">
    	<?php wp_nav_menu( array( 'theme_location' => 'mobile-nav','container' => 'false','menu_class' => 'sb-menu')); ?>
    </div>
	<?php wp_footer(); ?>
  </body>
</html>