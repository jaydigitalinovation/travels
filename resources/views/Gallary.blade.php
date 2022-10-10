@extends('layout.header_footer')

@section('content')


	<div class="in_banner">
    	<div class="container">
    		<div class="in_head">
    			<h3>Gallery</h3>
    		</div>
    		<div class="in_dis">
    			<ul>
    				<li>Home</li>
    				<li><span>Gallery</span></li>
    			</ul>
    		</div>
    	</div>
    </div>
    <div id="gallery">
        <div class="container">
            <div id="image-gallery">
                <div class="row">

                	@foreach($gallary_data as $g)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/500"><img src="uploads/{{$g->multiple_image}}" class="img-responsive"></a>
                            <div class="img-overlay">
                              <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script type="text/javascript">
    
    $("#menu-button").click(function(){
      $(this).toggleClass("active");
      $("#line-1").toggleClass("active");
      $("#line-2").toggleClass("active");
      $("#line-3").toggleClass("active");
      $("#menu").slideToggle("slow");
    });    

    $(function(){
  
    $('li.dropdown > a').on('click',function(event){

    event.preventDefault();
    $(this).toggleClass('selected');
    $(this).parent().find('ul').first().toggle(300);

    $(this).parent().siblings().find('ul').hide(200);

    //Hide menu when clicked outside
    $(this).parent().find('ul').parent().mouseleave(function(){ 
      var thisUI = $(this);
      $('html').click(function(){
        thisUI.children(".dropdown-menu").hide();
    thisUI.children("a").removeClass('selected');
               
        $('html').unbind('click');
      });
    });


    });

    });

    var btn = $('.up-btn');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show1');  
            }
            else {
                btn.removeClass('show1');
            }
        });
        btn.on('click', function(e) {
            e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    }); 

    $(window).scroll(function(){
            if ($(this).scrollTop() > 50) {
                $('#dynamic').addClass('newClass');
            } else {
                $('#dynamic').removeClass('newClass');
            }
        });

    $( ".img-wrapper" ).hover(
      function() {
        $(this).find(".img-overlay").animate({opacity: 1}, 600);
      }, function() {
        $(this).find(".img-overlay").animate({opacity: 0}, 600);
      }
    );

    var $overlay = $('<div id="overlay"></div>');
    var $image = $("<img>");
    var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
    var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
    var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

    $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
    $("#gallery").append($overlay);

    $overlay.hide();

    $(".img-overlay").click(function(event) {
      event.preventDefault();
      var imageLocation = $(this).prev().attr("href");
      $image.attr("src", imageLocation);
      $overlay.fadeIn("slow");
    });

    $overlay.click(function() {
      $(this).fadeOut("slow");
    });

    $nextButton.click(function(event) {
      $("#overlay img").hide();
      var $currentImgSrc = $("#overlay img").attr("src");
      var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
      var $nextImg = $($currentImg.closest(".image").next().find("img"));
      var $images = $("#image-gallery img");
      if ($nextImg.length > 0) { 
        $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
      } else {
        $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
      }
      event.stopPropagation();
    });

    $prevButton.click(function(event) {
      $("#overlay img").hide();
      var $currentImgSrc = $("#overlay img").attr("src");
      var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
      var $nextImg = $($currentImg.closest(".image").prev().find("img"));
      $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
      event.stopPropagation();
    });

    $exitButton.click(function() {
      $("#overlay").fadeOut("slow");
    });
    </script>













@endsection