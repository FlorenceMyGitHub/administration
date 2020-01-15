 <!-- javascript -->
    
    <script src="<?= $GLOBALS['prefixe']?>assets/owlcarousel/owl.carousel.js"></script>


<div class="h-page">    
    <div class="container-fluid">
    <!-- Page Content -->

      <!--  Demos -->
      <div class="row">
        <div class="large-12 columns">
        </div>
      </div> <!-- myImg -->

      <!--   <div id="carousel-wrap"> -->
      <div id="owl-mob" class="owl-carousel owl-theme"> <!-- <div id="owl-demo" class="owl-carousel owl-theme"> -->
        <?php echo $html ?>        
      </div>
      <!--     </div> -->
      <script>     

            jQuery(document).ready(function($) {
                
                var owl;
              
            if ( $(window).width() > 976) {  
                
                  owl = $('.owl-carousel');
              owl.on('initialize.owl.carousel initialized.owl.carousel ' +
                'initialize.owl.carousel initialize.owl.carousel ' +
                'resize.owl.carousel resized.owl.carousel ' +
                'refresh.owl.carousel refreshed.owl.carousel ' +
                'update.owl.carousel updated.owl.carousel ' +
                'drag.owl.carousel dragged.owl.carousel ' +
                'translate.owl.carousel translated.owl.carousel ' +
                'to.owl.carousel changed.owl.carousel',
                function(e) {
                  $('.' + e.type)
                    .removeClass('secondary')
                    .addClass('success');
                  window.setTimeout(function() {
                    $('.' + e.type)
                      .removeClass('success')
                      .addClass('secondary');
                  }, 500);
                });
                // items: 1 === nav est tjrs là
              owl.owlCarousel({
              autoWidth: true,
                loop: true,
                nav: true,
                lazyLoad: true,
                  responsive:false,
                navText:["<div class='nav-btn prev-slide'><img src='<?= $GLOBALS['prefixe']?>img/logos/left.png'></div>","<div class='nav-btn next-slide'><img src='<?= $GLOBALS['prefixe']?>img/logos/right.png'></div>"],
                margin: 10,
                dots : false,
                responsive: false,
                  autoHeight:false,
                   items: 1
              });
                
                
          $("#owl-demo").owlCarousel({
            navigation : true,
              
          });
                
                
// Get the modal
var modal = document.getElementById('myModal');
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
$('.item img').click(function(){ 
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}); 

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
        
if ( $("#owl-mob").hasClass("owl-carousel owl-theme") == false) {
  $("#owl-mob").addClass("owl-carousel owl-theme");
}
            
} else {
    $("#owl-mob").removeClass("owl-carousel owl-theme");
    $('.item img').off( "click");
}   
                
$( window ).resize(function() {      
  location.reload();
});
                
});
              
          
</script>
        
        
        <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close"><img src="<?= $GLOBALS['prefixe']?>img/logos/croix.png" alt="close"></span>

  <!-- Modal Content (The Image) -->
  <!-- <img class="modal-content" id="img01"> -->
    <figure>
        <div class="div-modal">
        <img class="modal-content" id="img01">
        <figcaption id="caption">Légende associée</figcaption>
        </div>
    </figure>
  <!-- Modal Caption (Image Text) -->
<!--  <div id="caption"></div> -->
</div>
    
</div>         
    

    <!-- Bootstrap core JavaScript 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->

<div class="text-center">
<a target="_blank" href="https://www.facebook.com/MaudGirardPage/"><img class="logos" src="<?= $GLOBALS['prefixe']?>img/logos/fb.png"/></a>
<a target="_blank" href="https://www.instagram.com/maud_girard_art/"><img class="logos" src="<?= $GLOBALS['prefixe']?>img/logos/insta.png"/></a>
<p class="copyright copyr-gall">All images copyright Maud Girard All rights reserved.</p>
</div>

    <!-- vendors -->
    <script src="<?= $GLOBALS['prefixe']?>assets/vendors/highlight.js"></script>
    <script src="<?= $GLOBALS['prefixe']?>assets/js/app.js"></script>
<script>

</script>

  </body>

</html>
