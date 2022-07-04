<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Ηρώ Νικοπούλου</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link type="text/css" rel="stylesheet" media="all" href="./css/default.css?J" />
<link type="text/css" rel="stylesheet" media="all" href="./css/layout.css?J" />
<link type="text/css" rel="stylesheet" media="all" href="./css/style.css?J" />
<link type="text/css" rel="stylesheet" media="all" href="./css/popup.css?J" />
<link type="text/css" rel="stylesheet" media="print" href="./css/print.css?J" />

<script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="./js/jquery.form.js"></script>
<script type="text/javascript" src="./js/jquery.dimensions.js"></script>
<script type="text/javascript" src="./js/jquery.tooltip.js"></script>
<script type="text/javascript" src="./js/custom.js"></script>

   <script language="javaScript" type="text/javascript" >
   var popupStatus = 0;
   var fullSizeImageDisplay =0;
   var isLclLang = true;
   var randomSum=0;
   var captions={
	   EN:{
   		close:"Close"
   	},
   		GR:{
   		close:"Κλείσιμο"
   	}
   };
   
   function processImagesInBody()
   {
	  // var elms = $('#bodyField > a[rel="lightbox"]').get();
	   $('#bodyField a[rel="lightbox"]').click(function(){
		   var jLink = $( this );
		   showFullSizeImage( jLink.attr( "href" ) );
		   
		// Prevent default click.
			return( false );
		});
   }
   
 //loading popup with jQuery magic!
   function loadPopup(){
	   //loads popup only if it is disabled
	   if(popupStatus==0){
		   $("#backgroundPopup").css({
		   "opacity": "0.7"
		   });
		   $("#backgroundPopup").fadeIn("slow");
		   $("#popupArea").fadeIn("slow");
		   popupStatus = 1;
	   }
   }
 //disabling popup with jQuery magic!
   function disablePopup(){
	   //disables popup only if it is enabled
	   hideFullSizeImage();
	   if(popupStatus==1){
		   $("#backgroundPopup").fadeOut("slow");
		   $("#popupArea").fadeOut("slow");
		   popupStatus = 0;
	   }
   }
 //centering popup
   function centerPopup(){
	   //request data for centering
	   var windowWidth = document.documentElement.clientWidth;
	   var windowHeight = document.documentElement.clientHeight;
	   var popupHeight = $("#popupArea").height();
	   var popupWidth = $("#popupArea").width();
	   //centering
	   $("#popupArea").css({
	   "position": "absolute",
	   "top": windowHeight/2-popupHeight/2,
	   "left": windowWidth/2-popupWidth/2-12
	   });
	   //only need force for IE6	
	   $("#backgroundPopup").css({
	   "height": windowHeight
	   });
   }
   $(document).ready(function(){
	
	});
	
      
   $(function(){
				// Get a reference to the content div (into which we will load content).
				var jContent = $( "#popupArea" );
				var jformContent = $( "#popupFormArea" );
				var htmlStr='';		

				$('#backgroundPopup').tooltip({
					delay: 500,
					showURL: false,
					track:true,
					bodyHandler: function() {
						return 'Κάντε κλικ για επιστροφή';
					},
					fade: 200 
				});
				

				 //LOADING POPUP
				//Click the button event!
				$("a.tabLink").click(function(){
					//centering with css
					centerPopup();
					//load popup
					loadPopup();
				});
				$("a.formLink").click(function(){
					//centering with css
					centerPopup();
					//load popup
					loadPopup();
				});
				//Click out event!
				$("#backgroundPopup").click(function(){
					disablePopup();
				});
				//Press Escape event!
				$(document).keypress(function(e){
					if(e.keyCode==27 && popupStatus==1){
						disablePopup();
					}
				});
									
				// Hook up link click events to load content.
				$( "a.tabLink" ).click(
					function( objEvent ){
						var jLink = $( this );						
						// Clear status list.
						$( "#ajax-status" ).empty();					
						// Launch AJAX request.
						$.ajax(
						{
							// The link we are accessing.
							url: jLink.attr( "href" ),								
							// The type of request.
							type: "get",								
							// The type of data that is getting returned.
							dataType: "html",								
							error: function(){							
								htmlStr += "<p>Page Not Found!!</p>" ;
							},								
							beforeSend: function(){								
								htmlStr+=  "AJAX - beforeSend()" ;
								jContent.html( '<div style="width:100%;text-align:center">'+
										'<img src="./css/images/loader.gif">'+
										'</div>' );
							},								
							complete: function(){							
							},								
							success: function( strData ){
								htmlStr+= "AJAX - success()" ;
								// Load the content in to the page.
								jContent.html( '<a id="popupClose" onclick="disablePopup();">x</a> '+strData );
								processImagesInBody();
							}
						});						
						// Prevent default click.
						return( false );					
					});					

				$( "a.formLink" ).click(	
						function( objEvent ){
							addFormInfo();
							// Prevent default click.
							return( false );	
						});		
				
			});
	function showFullSizeImage(imgSrc)
	{
		var titleAttr=(isLclLang)?captions.GR.close:captions.EN.close;
		if(fullSizeImageDisplay==0)
		{
			$( "#imgWrapper" ).html( '<div style="margin:0 auto;">'+					
									'<img src="http://pictorial.ironikopoulou.gr/'+imgSrc+'"></div>' );
		 var popupOffset = $("#popupArea").offset();		   
		   $("#imgWrapper").css({
		   	"position": "absolute",
		  	"top": popupOffset.top/4 +'px',
		   	"left": '0px'
		   });
		   $("#imgWrapper").fadeIn("slow");
		   $("#imgWrapper").click(
			function( objEvent ){
				hideFullSizeImage();
			});
		   fullSizeImageDisplay=1;
		}
		return false;
	}
	function hideFullSizeImage()
	{
		if(fullSizeImageDisplay==1)
		{
			$("#imgWrapper").fadeOut("slow");
			//$( "#imgWrapper" ).html('');
		}
		fullSizeImageDisplay=0;
		return false;
	}

//http://stackoverflow.com/questions/1525664/jquery-how-to-bind-onclick-event-to-dynamically-added-html-element
	function openPopUpManually(popUpUrl){
		if(popUpUrl=='contactForm'){
			addFormInfo();
		}
	}
	
	function addFormInfo()
	{
		var randomnumber1=Math.floor(Math.random()*10);
		var randomnumber2=Math.floor(Math.random()*10);
		randomSum=randomnumber1+randomnumber2;
		
		$( "#popupArea" ).html( '<a id="popupClose" onclick="disablePopup();">x</a>' +
						'<div>Παρακαλώ στείλτε email στο <a href="mailto:ironet@otenet.gr">ironet@otenet.gr</a> ή συμπληρώσετε<br/> την ακόλουθη φόρμα επικοινωνίας<br/></div>'+
						'<form id="contactForm" action="sendusermessage.php" method="post" style="font-weight: bold;"> '+
							'<div>'+
								'<span style="color:red;">*</span>&nbsp;<span class="forminfo">Υποχρεωτικά πεδία</span>'+
							'</div>'+
							'<div>'+
								'<label>Ηλεκτρονική Διεύθυνση:&nbsp;<span style="color:red;">*</span></label><input type="text" id="email" name="email" size="40" maxlength="40"/>'+
							'</div>'+
							'<div>'+
								'<label>Ονοματεπώνυμο:&nbsp;<span style="color:red;">*</span></label><input type="text" id="fullname" name="fullname" size="40" maxlength="40"/>'+
							'</div>'+
							'<div>'+
								'<label>Θέμα:&nbsp;<span style="color:red;">*</span></label><input type="text" id="subject" name="subject" size="40" maxlength="40"/>'+
							'</div>'+
							'<div>'+
								'<label>Μήνυμα : <span class="forminfo">( Μέγιστο πλήθος χαρακτήρων 2000 )</span></label><textarea id="message" name="message" rows="15" cols="50" maxlength="2000"></textarea>'+
							'</div>'+
							'<div>'+
								'<label>Ερώτηση Ασφαλείας : <span class="forminfo">( υπολογίστε και συμληρώστε το άθροισμα )</span></label><em><span style="font-size:14px;">'+randomnumber1+'+'+randomnumber2+'=</span></em><input type="text" id="security" name="security" size="1" maxlength="2"/><br/><br/>'+
							'</div>'+												
							'<div>'+
								'<input type="submit" value="Αποστολή Μηνύματος" />'+
							'</div>'+
						'</form> '+
						' ' );
		$('#contactForm').ajaxForm(
				{
					beforeSubmit: function(){
						var emailValue = $('input[name=email]').fieldValue(); 
				  	var fullnameValue = $('input[name=fullname]').fieldValue(); 
				  	var subjectValue = $('input[name=subject]').fieldValue();
				  	var securityAnswer=$('input[name=security]').fieldValue();
				 		var mandatoryFieldsNotCompleted = false;
				    	if(!emailValue[0]){
				    		mandatoryFieldsNotCompleted=true;
				    		$('input[name=email]').addClass("notCompleted");
				    	}else{
			    			$('input[name=email]').removeClass("notCompleted");
				    	}
				    	if(!fullnameValue[0]){
				    		mandatoryFieldsNotCompleted=true;
				    		$('input[name=fullname]').addClass("notCompleted");
				    	}
				    	else{
				    		$('input[name=fullname]').removeClass("notCompleted");									    		
				    	}
				    	if(!subjectValue[0]){
				    		mandatoryFieldsNotCompleted=true;
				    		$('input[name=subject]').addClass("notCompleted");
				    	}
				    	else{
				    		$('input[name=subject]').removeClass("notCompleted");									    		
				    	}
				    	
				    	if ( mandatoryFieldsNotCompleted ){ 
				    	    alert('Παρακαλώ συμπληρώστε τα υποχρεωτικά πεδία'); 
				     	   return false; 
				    	}
				    	else{
				    		/* check email form	*/
					    	var emailPattern = new RegExp("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$");
					    	if(!emailPattern.test(emailValue[0]))
						    {
					    		$('input[name=email]').addClass("notCompleted");
					    		alert('Παρακαλώ συμπληρώστε έγκυρη ηλεκτρονική διεύθυνση'); 
					    	    $('input[name=email]').select();
					     	    return false;	
						    }										    		
				    	}
				    	if(securityAnswer[0]!=randomSum){
				    		alert('Παρακαλώ απαντήστε σωστά στην ερώτηση ασφαλείας'); 
				    		$('input[name=security]').focus();
					     	return false; 
				    	}				    	
		        },
		        success : function() { 
			              $( "#popupArea" ).html( '<a id="popupClose" onclick="disablePopup();">x</a>' + 
									 '<div style="font-weight:bold;color:#B00241;">Σας ευχαριστούμε για το μήνυμα σας.<br/> Σύντομα θα έχετε νέα μας.</div> '+
		               					  ' ' );
		        }							            
			}); 
		$('#message').blur(function() {	
			var textareaElm = $(this);
			var maxlength = parseInt(textareaElm.attr('maxlength'));
			var currentValue = textareaElm.val(),
				currValLen = 	currentValue.length;	
			  if(currValLen > maxlength){
				  alert('έχετε υπερβεί το μέγιστο πλήθος χαρακτήρων')
				  textareaElm.val(currentValue.substr(0, maxlength));
			  }			  
			});		
	}//end addFormInfo()
	
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25974977-1']);
  _gaq.push(['_setDomainName', 'ironikopoulou.gr']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>  
  <body class="no-sidebars">
    <div id="page">
    <div id="main" class="clearfix">    
      <div id="content">
        <div id="content-inner" class="inner column center">   
           <div id="content-header">
               <div id="nametitle"><h1 class="headerName">Ηρώ Νικοπούλου</h1></div>
                 <div id="textwrap">
                 	<div id="image"><img src='./css/images/irwPhoto.png' /></div>
             	    <div id="menulist">
                    <ul id="menu">
                    <li class="majorLinks"><a href="http://pictorial.ironikopoulou.gr">Εικαστικά</a></li>
                    <li class="majorLinks"><a href="http://literature.ironikopoulou.gr">Λογοτεχνία</a></li>
                    <li class="links"><a href="./content.php?nodeId=202"class="tabLink">Βιογραφικό</a></li>
                    <li class="links"><a href="./content.php?nodeId=210"class="tabLink">About Me/Translations</a></li>
                    <li class="minorLinks"><a href="./content.php?nodeId=211"class="tabLink">Σύνδεσμοι</a></li>
                    <li class="minorLinks"><a href="javascript:void(0);"class="formLink">Επικοινωνία</a></li>
                    </ul>
                    </div>
             		</div>
          </div><!-- /#content-header -->
          <div id="popupArea"></div>
          <div id="popupFormArea"></div>
           <div id="imgWrapper"></div>
          <div id="fullSizeImageWrapper"></div>
		  <div id="backgroundPopup"></div>         
         </div>	 <!-- content-inner  -->
        </div> <!-- content -->
          <div id="sidebar-first" class="column sidebar first">
            <div id="sidebar-first-inner" class="inner">            	
            </div>
          </div>
          <div id="sidebar-second" class="column sidebar second">
            <div id="sidebar-second-inner" class="inner">
            </div>
          </div>        
      </div> <!-- /main -->
    </div> <!-- /page -->
    <div id="divInfo"></div>
  </body>
</html>
