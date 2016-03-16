@extends('layout')

@section('content')



    <a id="contact" style="position: absolute; bottom: 0px; left:0;"></a>

    <header>
        <span class="font_color"><a class="scroll font_color" href="#top">Jerry McNeive<span class="myName_desktop">, Web & Design</span></a></span>
        <ul class="navi_fade">
            <li><a class="scroll" href="#work">Work</a></li>
            <li><a class="scroll" href="#about">About</a></li>
            <li><a class="scroll" href="#contact">Contact</a></li>
        </ul>
    </header>
    
    <div class="main">
         <!-- h1 class="font_color wow fadeInUp">Hi.</h1> -->

         <input type="text" class="search" />
         
         <div class="work_link font_color">
            <a class="font_color scroll" href="#work">Work</a>
         </div>
         
         <div class="customer">
            <a class="scroll" href="#about">About</a>
         </div>
         
         <div class="home_description">
            <a class="scroll" href="#contact">Contact</a>
         </div>
    </div>

    <div class="teaser-container" id="work">
        <div class="teaser_item wow fadeInUp"><a href="work/soundwipe-music-app.html" class="fadeOutLink"><img src="http://placehold.it/1000x1000"></a></div>
        <div class="teaser_item wow fadeInUp"><a href="work/soundwipe-music-app.html" class="fadeOutLink"><img src="http://placehold.it/1000x1000"></a></div>
        <div class="teaser_item wow fadeInUp"><a href="work/soundwipe-music-app.html" class="fadeOutLink"><img src="http://placehold.it/1000x1000"></a></div>

        <div class="teaser_item wow fadeInUp"><a href="work/soundwipe-music-app.html" class="fadeOutLink"><img src="http://placehold.it/1000x1000"></a></div>
        <div class="teaser_item wow fadeInUp"><a href="work/soundwipe-music-app.html" class="fadeOutLink"><img src="http://placehold.it/1000x1000"></a></div>
        <div class="teaser_item wow fadeInUp"><a href="work/soundwipe-music-app.html" class="fadeOutLink"><img src="http://placehold.it/1000x1000"></a></div>
<!--         <div class="teaser_item wow fadeInUp"><a href="work/sixt-radio-spots.html" class="fadeOutLink"><img src="images/portfolio_sixt.jpg"></a></div>
        <div class="teaser_item wow fadeInUp"><a href="work/mercedes-print-ads.html" class="fadeOutLink"><img src="images/portfolio_mercedes.jpg"></a></div>
        
        <div class="teaser_item wow fadeInUp"><a href="work/national-youth-ballet-poster.html" class="fadeOutLink"><img src="images/portfolio_bjb.jpg"></a></div>
        <div class="teaser_item wow fadeInUp"><a href="work/sixt-poster-ad.html" class="fadeOutLink"><img src="images/portfolio_sixt_mini.jpg"></a></div>
        <div class="teaser_item wow fadeInUp"><img src="images/portfolio_staubsauger.jpg" title="soon"></div> -->
        <br clear="all">
    </div>



<script>
	$.each($('.letter'),function(el,key){
	  $(this).delay(100 * key).fadeIn(1000);
	});
</script>

<script>
    $(function() {
        var sampleJobs=[
          "Jerry",
          "Designs for the web",
          "Develops for the future",
          "Cooks for two"
        ];

          /* <type text simulation> */
            var currentSampleJob=sampleJobs[0];
            var autoTypingActive=true;
            var transitionDelayTime=0;
            var sampleJobLength=0;
            var typingNow=false;
            var sampleJobTimer=0;
            var timer=null;

            /* <blinking cursor> */
              setInterval(function() {
                    if(autoTypingActive) {
                  if($('.search').val().substr(-1)=='|') {
                    $('.search').val($('.search').val().substr(0,$('.search').val().length-1)+' ');
                  }
                  else if($('.search').val().substr(-1)==' ') {
                    $('.search').val($('.search').val().substr(0,$('.search').val().length-1)+'|');
                  }
                  else {
                    $('.search').val($('.search').val()+'|');
                  }
                }
              },500);
            /* </blinking cursor> */

              /* <let user disable simulator> */
                var prevValue;
                $('.search').bind('focus',function() {
                  if(autoTypingActive) {
                  $(this).val('');
                  clearTimeout(timer);
                  autoTypingActive=false;
                }
                });
                  $('.search').bind('click keyup',function() {
                    if(autoTypingActive) {
                  $(this).val('');
                  clearTimeout(timer);
                  autoTypingActive=false;
                }
                if(prevValue!=$(this).val()) {
                  //$(this).val(ucfirst($(this).val()));
                  prevValue=$(this).val();
                }
              });
              $('.search').bind('blur',function(e) {
                if($(this).val()=='') {
                  sampleJobLength=0;
                  typingNow=false;
                  autoTypingActive=true;
                  nextSampleJob(true);
                }
              });
              /* </let user disable simulator> */

              /* <typeText> */
              typeText=function() {
                displaySampleJob=currentSampleJob.substr(0, sampleJobLength++);
                if(empty(displaySampleJob)) {
                  $('.search').val(' ');
                }
                else {
                  $('.search').val(displaySampleJob);
                  //$('.search').focus();
                }
                  if(sampleJobLength < currentSampleJob.length+1) {
                    // next letter
                      typingNow=true;
                      randomMultiplier=80;
                      random=Math.floor(Math.random()*(randomMultiplier*2));
                        timer=setTimeout(typeText, random);
                  } else {
                    // start backspacing
                        sampleJobLength = 0;
                        currentSampleJob = '';
                        typingNow=false;
                        timer=setTimeout(backspaceText,1250+250*Math.random());
                  }
              }
              /* </typeText> */

              /* <backspaceText> */
              backspaceText=function() {
                displaySampleJob=$('.search').val().slice(0, -1);

                /* avoid empty div */
                if(empty(displaySampleJob)) {
                  $('.search').val(' ');
                }
                else {
                  $('.search').val(displaySampleJob);
                }


                if(!empty(displaySampleJob)) {
                  // backspace again
                      randomMultiplier=80;
                      random=Math.floor(Math.random()*(randomMultiplier*1.5));
                    timer=setTimeout(backspaceText, random);
                    //$('.search').focus();
                }
                else {
                  // next sampleJob
                    nextSampleJob();
                }
              }
              /* </backspaceText> */

              /* <nextSampleJob> */
              nextSampleJob=function(instantly) {
                sampleJobTimer++;
                // if last sampleJob, reset to first
                    if(sampleJobTimer>(sampleJobs.length-1)) {
                      sampleJobTimer=0;
                    }
                    currentSampleJob=sampleJobs[sampleJobTimer];
                    if(instantly) {
                      typeText();
                    }
                    else {
                  timer=setTimeout(typeText,500);
                }
              }
              /* </nextSampleJob> */

              typeText();

          /* </type text simulation> */
    });


    function empty(mixed_var) {
      var undef, key, i, len;
      var emptyValues = [undef, null, false, 0, '', '0'];

      for (i = 0, len = emptyValues.length; i < len; i++) {
        if (mixed_var === emptyValues[i]) {
          return true;
        }
      }

      if (typeof mixed_var === 'object') {
        for (key in mixed_var) {
          // TODO: should we check for own properties only?
          //if (mixed_var.hasOwnProperty(key)) {
          return false;
          //}
        }
        return true;
      }

      return false;
    }

</script>

@stop