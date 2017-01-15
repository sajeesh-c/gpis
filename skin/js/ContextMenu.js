
function ContextMenu(map, options){
	options=options || {};
	
	this.setMap(map);
	this.map_=map;
	this.mapDiv_=map.getDiv();
	
	this.id = options.id;
	this.classNames_=options.classNames || {};
	this.menuItems_=options.menuItems || [];
	this.pixelOffset=options.pixelOffset || new google.maps.Point(10, -5);
	this.zIndex = options.zIndex || null;
}

ContextMenu.prototype=new google.maps.OverlayView();

ContextMenu.prototype.draw=function(){
	if(this.isVisible_){
		var mapSize=new google.maps.Size(this.mapDiv_.offsetWidth, this.mapDiv_.offsetHeight);
		var menuSize=new google.maps.Size(this.menu_.offsetWidth, this.menu_.offsetHeight);
		var mousePosition=this.getProjection().fromLatLngToDivPixel(this.position_);
		
		var left=mousePosition.x;
		var top=mousePosition.y;
		
		if(mousePosition.x>mapSize.width-menuSize.width-this.pixelOffset.x){
			left=left-menuSize.width-this.pixelOffset.x;
		} else {
			left+=this.pixelOffset.x;
		}
		
		if(mousePosition.y>mapSize.height-menuSize.height-this.pixelOffset.y){
			top=top-menuSize.height-this.pixelOffset.y;
		} else {
			top+=this.pixelOffset.y;
		}
		
		this.menu_.style.left=left+'px';
		this.menu_.style.top=top+'px';
	}
};

ContextMenu.prototype.getVisible=function(){
	return this.isVisible_;
};

ContextMenu.prototype.hide=function(){
	if(this.isVisible_){
		this.menu_.style.display='none';
		this.isVisible_=false;
	}
};

ContextMenu.prototype.onAdd=function(){
	function createMenuItem(values){
		var menuItem=document.createElement('div');
		menuItem.innerHTML=values.label;
		if (this.id) {
			menu.id = this.id;
		}
		if(values.className){
			menuItem.className = values.className || self.classNames_.menuItem;
		}
		if(values.id){
			menuItem.id=values.id;
		}
		menuItem.style.cssText='cursor:pointer; white-space:nowrap';
		menuItem.style.color='#FFFFFF';
		menuItem.onclick=function(){
			google.maps.event.trigger($this, 'menu_item_selected', $this.position_, 
				values.eventName, $this.source);
			
			// Manually hide the menu because events are not allowed to propagate to map
			$this.hide();
		};
		return menuItem;
	}
	function createMenuSeparator(){
		var menuSeparator=document.createElement('div');
		if($this.classNames_.menuSeparator){
			menuSeparator.className=$this.classNames_.menuSeparator;
		}
		return menuSeparator;
	}
	var $this=this;	//	used for closures
	
	var menu=document.createElement('div');
	if(this.classNames_.menu){
		menu.className=this.classNames_.menu;
	}
	menu.style.cssText='display:none; position:absolute';
	if(this.zIndex != null) menu.style.zIndex = this.zIndex;
	
	
	// Turning off propagation of events down to the map
	var depropagator = function(e) {
		var evt = e ? e:window.event;
			if (evt.stopPropagation)    evt.stopPropagation();
			if (evt.cancelBubble!=null) evt.cancelBubble = true;
	};
	menu.onclick = depropagator;
	menu.onmouseover = depropagator;
	menu.onmousemove = depropagator;
	menu.onmouseenter = depropagator;
	menu.onmouseleave = depropagator;
	menu.onmouseout = depropagator;
	
	
	for(var i=0, j=this.menuItems_.length; i<j; i++){
		if(this.menuItems_[i].label && this.menuItems_[i].eventName){
			menu.appendChild(createMenuItem(this.menuItems_[i]));
		} else {
			menu.appendChild(createMenuSeparator());
		}
	}
	
	delete this.classNames_;
	delete this.menuItems_;
	
	this.isVisible_=false;
	this.menu_=menu;
	this.position_=new google.maps.LatLng(0, 0);
	
	google.maps.event.addListener(this.map_, 'click', function(mouseEvent){
		$this.hide();
	});
	
	this.getPanes().floatPane.appendChild(menu);
};

ContextMenu.prototype.onRemove=function(){
	this.menu_.parentNode.removeChild(this.menu_);
	delete this.mapDiv_;
	delete this.menu_;
	delete this.position_;
};


ContextMenu.prototype.show=function(latLng, source){
	this.source = source;
	if(!this.isVisible_){
		this.menu_.style.display='block';
		this.isVisible_=true;
	}
	this.position_=latLng;
	this.draw();
};
