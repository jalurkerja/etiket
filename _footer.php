
<!-- Start The Modal Notification -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p id="label_notification"></p>
  </div>
</div>
<!-- End The Modal Notification -->
	  
    <!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <section class="footer-Content">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="widget">
				        <div class="textwidget">
                  <p><b>PT. Indo Human Resource</b><br>
                          Epicentrum Walk Office Unit 709 A lantai 7<br>
                          Komplek Rasuna Epicentrum<br>
                          Jl. HR. Rasuna Said - Kuningan<br>
                          Jakarta 12940, Indonesia</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="widget">
				        <div class="textwidget">
                  &nbsp;
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="widget">
                <div class="textwidget">
                  <img src="_assets/img/iso_bg-red_3.png" alt="logo_ISO" style="max-width:28%;"> <br>
                  <p>ISO 9001:2015</p>
                </div>
              </div>
            </div> 
            
            <div class="col-lg-3 col-md-4 col-xs-12">
              <div class="widget">
                <ul class="mt-3 footer-social">
                  <li><a class="linkedin" target="blank" href="https://id.linkedin.com/company/pt.-indo-human-resource"><i class="lni-linkedin-fill"></i></a></li>
                  <li><a class="google-plus" target="blank" href="https://www.google.com/maps/dir/-6.2087634,106.845599/pt+indo+human+resource/@-6.2125302,106.8287301,15z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2e69f3f67caecfb5:0x9a91ab0f7260eb8c!2m2!1d106.8342427!2d-6.2182225"><i class="lni-map-marker"></i></a></li>
                </ul>        
              </div>
            </div>
			 
          </div>
        </div>
      </section>
      <!-- Footer area End -->
      
      <!-- Copyright Start  -->
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="site-info text-center">
                <p>Modified by <a href="#" rel="nofollow">IT Division</a></p>
              </div>     
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright End -->
    </footer>
    <!-- Footer Section End -->  

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-arrow-up"></i>
    </a> 

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="_assets/js/popper.min.js"></script>
    <script src="_assets/js/jquery-min.js"></script>
    <script src="_assets/js/bootstrap.min.js"></script>
    <script src="_assets/js/owl.carousel.min.js"></script>     
    <script src="_assets/js/jquery.slicknav.js"></script>     
    <script src="_assets/js/jquery.counterup.min.js"></script>      
    <script src="_assets/js/waypoints.min.js"></script>     
    <script src="_assets/js/form-validator.min.js"></script>
    <script src="_assets/js/contact-form-script.js"></script>   
    <script src="_assets/js/main.js"></script>
	<?php
		// $_SESSION["errormessage"] = "error test";
	?>
	<script>
		// Start The Modal Notification
			// Get the modal
			var modal = document.getElementById("myModal");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			  modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			  if (event.target == modal) {
				modal.style.display = "none";
			  }
			}
		// End The Modal Notification

	
		<?php if(isset($_SESSION["errormessage"]) && $_SESSION["errormessage"] != ""){ ?> 
			document.getElementById("label_notification").innerHTML="<?=$_SESSION["errormessage"];?>";
			document.getElementById("label_notification").style.color = "red";
			document.getElementById("label_notification").style.fontSize = "24px";
			modal.style.display = "block";
			<?php $_SESSION["errormessage"] = ""; ?>
		<?php } ?>
		
		<?php if(isset($_SESSION["message"]) && $_SESSION["message"] != ""){ ?> 
			document.getElementById("label_notification").innerHTML="<?=$_SESSION["message"];?>";
			document.getElementById("label_notification").style.color = "green";
			document.getElementById("label_notification").style.fontSize = "24px";
			modal.style.display = "block";
			<?php $_SESSION["message"] = ""; ?>
		<?php } ?>
		
	</script>
  </body>
</html>