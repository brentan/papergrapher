// zoom tool
// adapted from http://sketch.paperjs.org/

pg.tools.zoom = function() {
	var tool;
	var doRectZoom;
	
	var options = {
		name: 'Zoom',
		type: 'toolbar'
	};
	
	var activateTool = function() {
		tool = new Tool();
		
		setCursor('zoom-in');
		
		tool.onMouseDown = function(event) {
			if(event.event.button > 0) return; // only first mouse button
			
			doRectZoom = true;
			
		};
		
		tool.onMouseDrag = function(event) {
			if(event.event.button > 0) return; // only first mouse button
			
			if(doRectZoom) {
				//console.log('draggin zoom rect');
			}
		};
		
		tool.onMouseUp = function(event) {
			if(event.event.button > 0) return; // only first mouse button
			
			var factor = 1.5;
			if (event.modifiers.option) {
				factor = 1 / factor;
			}
			view.zoom *= factor;
			view.center = event.point;
			pg.toolbar.updateZoom();
		};
		
		var keyDownFired = false;
		tool.onKeyDown = function(event) {
			if(keyDownFired) return;
			keyDownFired = true;
			if (event.key === 'option') { 
				setCursor('zoom-out');
			}
		};
	
		tool.onKeyUp = function(event) {
			keyDownFired = false;
			doRectZoom = false;
			
			if (event.key === 'option') {
				setCursor('zoom-in');
			}
		};
		
		tool.activate();
	
	};
	
	var setCursor = function(cursorString) {
		var body = $('body');

		body.removeClass('zoom-in');
		body.removeClass('zoom-out');
		
		if(cursorString && cursorString.length > 0) {
			body.addClass(cursorString);
		}
	};
	
	
	var deactivateTool = function() {
		setCursor();
	};
	
	
	return {
		options:options,
		activateTool : activateTool,
		deactivateTool : deactivateTool
	};
	
};