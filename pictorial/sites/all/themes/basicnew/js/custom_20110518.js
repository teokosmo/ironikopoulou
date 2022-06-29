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
														contentAreaDefaultHeight );
	}
	else {
		if(  widthDiff > 120 || heightDiff > 100 )
		{
			zoomLevel=2;
			setElementsDimensions( parseInt(defaultPageWidth*zoomOut[zoomLevel]), 
															parseInt(defaultPageHeight*zoomOut[zoomLevel]), 
															parseInt(firstSideBarDefaultWidth*zoomOut[zoomLevel]), 
															parseInt(secondSideBarDefaultWidth*zoomOut[zoomLevel]), 
															parseInt((defaultPageHeight*zoomOut[zoomLevel])-sidebarTopPadding),
															parseInt(contentInnerDefaultWidth*(zoomOut[zoomLevel]-0.15)),
															parseInt(contentAreaDefaultHeight*zoomOut[zoomLevel]) );
			return;
		}
		if(  widthDiff <= 120 || heightDiff <= 100 )
		{
			zoomLevel=1;
			setElementsDimensions( parseInt(defaultPageWidth*zoomOut[zoomLevel]), 
															parseInt(defaultPageHeight*zoomOut[zoomLevel]), 
															parseInt(firstSideBarDefaultWidth*zoomOut[zoomLevel]), 
															parseInt(secondSideBarDefaultWidth*zoomOut[zoomLevel]), 
															parseInt((defaultPageHeight*zoomOut[zoomLevel])-sidebarTopPadding),
															parseInt(contentInnerDefaultWidth*(zoomOut[zoomLevel]-0.11)),
															parseInt(contentAreaDefaultHeight*zoomOut[zoomLevel]) );
		}
		
	}
}//end checkLayoutDimensions function

$(document).ready(function() 
{		
//INIT GLOBAL VARIABLES
//1224px  #page,#sidebar-first,#sidebar-second width
	defaultPageWidth = $('#page').width();
	firstSideBarDefaultWidth = $('#sidebar-first').width();
	secondSideBarDefaultWidth = $('#sidebar-second').width();
	contentInnerDefaultWidth = $('#content-inner').width();
//664px #content height
	defaultPageHeight =  $('#content').height();
	contentAreaDefaultHeight = $('#content-area').height();
	zoomOut=[1,0.9,0.8];
	divInfoElm=document.getElementById('divInfo');
	pageElm=document.getElementById('page');
	contentElm=document.getElementById('content');
	sidebarFirstElm=document.getElementById('sidebar-first');
	sidebarSecondElm=document.getElementById('sidebar-second');
	contentAreaElm=document.getElementById('content-area');
	contentInnerElm=document.getElementById('content-inner');
	sidebarTopPadding=25;
	
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
	resizeTimeoutId =setTimeout(function(){	checkLayoutDimensions();},10)
}

function setElementsDimensions(pageElmWidth, contentElmHeight, sideBarFirstElmWidth, sideBarSecondElmWidth, sideBarElmHeight, contentInnerElmWidth, contentAreaElmHeight)
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
	}
	if(sidebarSecondElm!=null){
		sidebarSecondElm.style.width=sideBarSecondElmWidth+'px';
		sidebarSecondElm.style.height=sideBarElmHeight+'px';
	}
	if(contentInnerElm!=null){
		contentInnerElm.style.width=contentInnerElmWidth+'px';
	}
	if(contentAreaElm!=null){
		contentAreaElm.style.height=contentAreaElmHeight+'px';
	}
}//end setElementsDimensions function

//GLOBAL VARIABLES
	var defaultPageWidth = null,
	 firstSideBarDefaultWidth = null,
	 secondSideBarDefaultWidth = null,
	 defaultPageHeight = null,
	 contentInnerDefaultWidth = null,
	 contentAreaDefaultHeight = null,
	 divInfoElm=null,
	 resizeTimeoutId = null,
	 zoomOut=new Array(),
	 zoomLevel=0,
	 pageElm=null,
	 contentElm=null,
	 sidebarFirstElm=null,
	 sidebarSecondElm=null,
	 sidebarTopPadding=null,
	 contentInnerElm=null,
	 contentAreaElm=null;