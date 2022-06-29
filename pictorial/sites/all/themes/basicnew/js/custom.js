function checkLayoutDimensions(){
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	var widthDiff = defaultPageWidth-windowWidth;
	var heightDiff = defaultPageHeight-windowHeight;
	if( widthDiff <= 0 && heightDiff <= 0 ){
		zoomLevel=0;
		setElementsDimensions( defaultPageWidth, 
														defaultPageHeight, 
														firstSideBarDefaultWidth, 
														secondSideBarDefaultWidth, 
														defaultPageHeight,
														contentInnerDefaultWidth,
														contentAreaDefaultHeight,
														firstSideBarDefaultPaddingTop,
														firstSideBarDefaultPaddingLeft,
														contentInnerMarginLeft);
	}
	else {
	zoomLevel=1;
			sidebarPaddingLeft=parseInt(firstSideBarDefaultPaddingLeft*(zoomOut[zoomLevel]-0.3));
			sidebarPaddingTop=parseInt(firstSideBarDefaultPaddingTop*zoomOut[zoomLevel]);	
			
			setElementsDimensions( parseInt(defaultPageWidth*zoomOut[zoomLevel]), 
															parseInt(defaultPageHeight*zoomOut[zoomLevel]), 
															parseInt((firstSideBarDefaultWidth*zoomOut[zoomLevel]) - sidebarPaddingLeft ),
															parseInt((secondSideBarDefaultWidth*zoomOut[zoomLevel]) - sidebarPaddingLeft ), 
															parseInt((defaultPageHeight*zoomOut[zoomLevel]) - sidebarPaddingTop ),
															parseInt(contentInnerDefaultWidth*(zoomOut[zoomLevel])),
															parseInt((contentAreaDefaultHeight*zoomOut[zoomLevel])), 
															sidebarPaddingTop,
															sidebarPaddingLeft,
															parseInt(contentInnerMarginLeft*zoomOut[zoomLevel]));		
		
	}//end else widthDiff <= 0 && heightDiff <= 0
}//end checkLayoutDimensions function

$(document).ready(function() 
{		
//INIT GLOBAL VARIABLES
//1224px  #page,#sidebar-first,#sidebar-second width
	defaultPageWidth = $('#page').width();
	firstSideBarDefaultWidth = $('#sidebar-first').width();
	firstSideBarDefaultPaddingTop = parseInt( $('#sidebar-first').css("padding-top") );
	firstSideBarDefaultPaddingLeft = parseInt( $('#sidebar-first').css("padding-left") );
	contentInnerMarginLeft = parseInt( $('#content-inner').css("margin-left") );
	secondSideBarDefaultWidth = $('#sidebar-second').width();
	contentInnerDefaultWidth = $('#content-inner').width();
//664px #content height
	defaultPageHeight =  $('#content').height();
  tabsHeight = $('.tabs').height() || 0;
	contentAreaDefaultHeight = $('#content-area').height() - tabsHeight;
	zoomOut=[1,0.85,0.8];
	divInfoElm=document.getElementById('divInfo');
	pageElm=document.getElementById('page');
	contentElm=document.getElementById('content');
	sidebarFirstElm=document.getElementById('sidebar-first');
	sidebarSecondElm=document.getElementById('sidebar-second');
	contentAreaElm=document.getElementById('content-area');
	contentInnerElm=document.getElementById('content-inner');
	
	checkLayoutDimensions();
//add event onresize checkLayoutDimensions();
	$(window).resize(function(){
		resizeHandler();
	});	
});

function resizeHandler()
{
	if(resizeTimeoutId){
		clearTimeout(resizeTimeoutId);
	}
	resizeTimeoutId =setTimeout(function(){	checkLayoutDimensions();},100);
}

function setElementsDimensions(pageElmWidth, contentElmHeight, sideBarFirstElmWidth, sideBarSecondElmWidth, sideBarElmHeight, contentInnerElmWidth, contentAreaElmHeight, sideBarFirstElmPaddingTop, sideBarFirstElmPaddingLeft, contentInnerElmMarginLeft)
{
	if(pageElm!=null){
		pageElm.style.width=pageElmWidth+'px';
	}
	if(contentElm!=null){
		contentElm.style.height=contentElmHeight+'px';
	}
	if(sidebarFirstElm!=null){
		sidebarFirstElm.style.width=sideBarFirstElmWidth+'px';
		sidebarFirstElm.style.height=sideBarElmHeight+'px';
		//set padding TOP & LEFT
		sidebarFirstElm.style.paddingTop=sideBarFirstElmPaddingTop+'px';
		sidebarFirstElm.style.paddingLeft=sideBarFirstElmPaddingLeft+'px';
	}
	if(sidebarSecondElm!=null){
		sidebarSecondElm.style.width=sideBarSecondElmWidth+'px';
		sidebarSecondElm.style.height=sideBarElmHeight+'px';
		//set padding TOP & LEFT
		sidebarSecondElm.style.paddingTop=sideBarFirstElmPaddingTop+'px';
		sidebarSecondElm.style.paddingLeft=sideBarFirstElmPaddingLeft+'px';
	}
	if(contentInnerElm!=null){
		contentInnerElm.style.width=contentInnerElmWidth+'px';
		contentInnerElm.style.marginLeft=contentInnerElmMarginLeft+'px';		
	}
	if(contentAreaElm!=null){
		contentAreaElm.style.height=contentAreaElmHeight+'px';
	}
}//end setElementsDimensions function

//GLOBAL VARIABLES
	var defaultPageWidth = null,
	 firstSideBarDefaultWidth = null,
	 firstSideBarDefaultPaddingTop = null,
	 firstSideBarDefaultPaddingLeft = null,
	 secondSideBarDefaultWidth = null,
	 defaultPageHeight = null,
	 contentInnerDefaultWidth = null,
	 contentAreaDefaultHeight = null,
	 contentInnerMarginLeft=null,
	 divInfoElm=null,
	 resizeTimeoutId = null,
	 zoomOut=new Array(),
	 zoomLevel=0,
	 pageElm=null,
	 contentElm=null,
	 sidebarFirstElm=null,
	 sidebarSecondElm=null,
	 contentInnerElm=null,
	 contentAreaElm=null,
   tabsHeight=null;