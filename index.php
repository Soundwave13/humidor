<?php
session_start();
    $userid = $_SESSION['uid'];
    if ($userid == null) {
    	 header( 'Location: signinform.php');
    	 die;
    }

$currentPage = "home";
include('beginningOfFile.php');

//CONNECT TO THE DATABASE -- WITH A VALID USER ID THAT HAS PERMISSION FOR THIS DATABASE:
include("constants.php");
$dbc = mysqli_connect(HOST,USERID,PASSWORD,DB);

//MAKE SURE WE HAVE A GOOD CONNECTION:
if (mysqli_connect_errno()) {

     echo 'ERROR -- COULD NOT CONNECT TO DB';
     exit;
}

// Report all errors except E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);

?>

<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>


<h4><p>Please select "Humidor" to add cigars to your online inventory or "Review" to review a cigar. Afterwards, you may go to "Analyze" to query information on the inventory and reviews compliled.</p>
<p>Thank you and enjoy!</p>
</h4><br><br>
                <div id="bodyright">
    				<div id="gallery1">
                    	
                        <div class="slider-wrapper theme-default"> 
    						<div class="ribbon"></div>
      						<div id="slider" class="nivoSlider"> 
                            <img src="images/Cig1.jpg" alt="" title=""/>
                      		<img src="images/Cig2.jpg" alt="" title=""/>
                     		<img src="images/Cig3.jpg" alt="" title=""/>
              				<img src="images/Cig4.jpg" alt="" title=""/>
                            <img src="images/Cig5.jpg" alt="" title=""/></div>
                            
    	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
			effect: 'fade',               // Specify sets like: 'fold,fade,sliceDown'
			//slices: 15,                     // For slice animations
			//boxCols: 8,                     // For box animations
			//boxRows: 4,                     // For box animations
			animSpeed: 600,                 // Slide transition speed
			pauseTime: 3500,                // How long each slide will show
			startSlide: 0,                  // Set starting Slide (0 index)
			directionNav: true,             // Next & Prev navigation
			controlNav: true,               // 1,2,3... navigation
			controlNavThumbs: false,        // Use thumbnails for Control Nav
			pauseOnHover: false,             // Stop animation while hovering
			manualAdvance: false,           // Force manual transitions
			prevText: 'Prev',               // Prev directionNav text
			nextText: 'Next',               // Next directionNav text
			randomStart: true,             // Start on a random slide
			beforeChange: function(){},     // Triggers before a slide transition
			afterChange: function(){},      // Triggers after a slide transition
			slideshowEnd: function(){},     // Triggers after all slides have been shown
			lastSlide: function(){},        // Triggers when last slide is shown
			afterLoad: function(){}         // Triggers when slider has loaded
		});
		});
		</script>
		
		
<?php include("endOfFile.php");?>   