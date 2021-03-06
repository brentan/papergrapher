<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=0.75, maximum-scale=0.75">
	<title>Papergrapher</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/spectrum.css" rel="stylesheet" />
	<link href="css/spectrum_override.css" rel="stylesheet" />
	<link href="css/menu.css" rel="stylesheet" />
	<link href="css/styles.css" rel="stylesheet" />
	<link href="css/toolbar.css" rel="stylesheet" />
	<link href="css/settingsbar.css" rel="stylesheet" />

</head>
<body>
	<canvas id="paperCanvas" data-paper-resize="true"></canvas>
	
	<!-- Main Menu -->
	<nav class="appNav" id="appNav">
		<ul class="topMenu">
			<li class="topMenuButton">File
				<ul class="subMenu" id="fileSubMenu">
					<li class="clearDocument_button">Clear Document</li>
					<li class="resetSettings_button">Reset Settings</li>
					<hr />
					<li class="importImage_button">Import Image<input id="fileUploadImage" class="fileUploadInput" type="file" data-url="import/"></li>
					<li class="importImageFromURL_button">Import Image from URL</li>
					<li class="exportImage_button">Export Image</li>
					<hr />
					<li class="importSVG_button">Import SVG<input id="fileUploadSVG" class="fileUploadInput" type="file" data-url="import/"></li>
					<li class="importSVGFromURL_button">Import SVG from URL</li>
					<li class="exportSVG_button">Export SVG</li>
					<hr />
					<li class="importJSON_button">Import JSON<input id="fileUploadJSON" class="fileUploadInput" type="file" data-url="import/"></li>
					<li class="exportJSON_button">Export JSON</li>
				</ul>
			</li>
			<li class="topMenuButton">Edit
				<ul class="subMenu" id="editSubMenu">
					<li class="undo_button">Undo</li>
					<li class="redo_button">Redo</li>
					<hr />
					<li class="copyToClipboard_button">Copy</li>
					<li class="pasteFromClipboard_button">Paste</li>
					<li class="deleteSelection_button">Delete</li>
				</ul>
			</li>
			<li class="topMenuButton">Object
				<ul class="subMenu" id="objectSubMenu">
					<li class="group_button">Group</li>
					<li class="ungroup_button">Ungroup</li>
					<hr />
					<li class="bringToFront_button">Bring to Front</li>
					<li class="sendToBack_button">Send to Back</li>
					<hr />
					<li class="createCompoundPath_button">Create Compound Path</li>
					<li class="releaseCompoundPath_button">Release Compound Path</li>
				</ul>
			</li>
			<li class="topMenuButton">Select
				<ul class="subMenu" id="selectSubMenu">
					<li class="selectAll_button">Select all</li>
					<li class="deselectAll_button">Deselect all</li>
					<li class="invertSelection_button">Invert selection</li>
				</ul>
			</li>
			
			<li class="topMenuButton">View
				<ul class="subMenu" id="viewSubMenu">
					<li class="zoomIn_button" title="Alt-ScrollUp">Zoom In</li>
					<li class="zoomOut_button" title="Alt-ScrollDown">Zoom Out</li>
					<li class="resetZoom_button" title="Ctrl-1">Reset Zoom</li>
				</ul>
			</li>
			
			<li class="topMenuButton">Window
				<ul class="subMenu" id="windowSubMenu">
					<li class="scriptEditorButton" title="Script Editor">Script Editor</li>
				</ul>
			</li>
		</ul>
	</nav>
	
	
	<div id="toolbar" class="hidden toolbar">
		
		<!-- Tools Container -->
		<div class="toolsContainer toolbarSection">
			<div class="tool_Select tool" data-name="Select" title="Select (V)"></div>
			<div class="tool_DetailSelect tool" data-name="DetailSelect" title="Detail select (A)"></div>
			<div class="tool_Draw tool" data-name="Draw" title="Draw"></div>
			<div class="tool_Bezier tool" data-name="Bezier" title="Pen (P)"></div>
			<div class="tool_Cloud tool" data-name="Cloud" title="Cloud"></div>
			<div class="tool_BroadBrush tool" data-name="BroadBrush" title="Broad Brush"></div>
			<div class="tool_Text tool" data-name="Text" title="Text (T)"></div>
			<div class="tool_Eyedropper tool" data-name="Eyedropper" title="Eyedropper (I)"></div>
			<div class="tool_Circle tool" data-name="Circle" title="Circle"></div>
			<div class="tool_Rectangle tool" data-name="Rectangle" title="Rectangle"></div>
			<div class="tool_Rotate tool" data-name="Rotate" title="Rotate (R)"></div>
			<div class="tool_Scale tool" data-name="Scale" title="Scale (S)"></div>
			<div class="tool_Zoom tool" data-name="Zoom" title="Zoom (Z)"></div>
			<div class="tool_Test tool" data-name="Test" title="Test"></div>
		</div>
		
		<!-- Color Container -->
		<div class="colorContainer toolbarSection">
			<input type="text" id="fillColorInput" class="fillColor" />
			<input type="text" id="strokeColorInput" class="strokeColor"/>
			<div class="colorSwitchButton" id="colorSwitchButton" title="Switch colors"></div>			
		</div>
		
		
	</div>
	
	<div id="settingsBarContainer" class="settingsBarContainer">
		
		<div id="selectionInfoBar" class="settingsBar">
			<div id="selectionTypeLabel" class="selectionTypeLabel"></div>
		</div>
		
		<div id="detailSelectionBar" class="settingsBar hidden">
			<button id="switchHandlesButton">Switch handles</button>
			<button id="removeSegmentButton">Remove segments</button>
			<button id="splitPathButton">Split path</button>
		</div>
		
		<div id="styleSectionBar" class="settingsBar">
			<div class="opacitySection settingsSection">
				<label class="opacityLabel">Opacity</label>
				<input type="number"  min="0" max="100" maxlength="3" id="opacityInput" value="100" class="opacityInput comboInput" title="Opacity"/>
				<select id="opacitySelect" class="opacitySelect comboSelect" title="Opacity">
					<option class="hidden" selected value=""></option>
					<option value="0">0%</option>
					<option value="10">10%</option>
					<option value="20">20%</option>
					<option value="30">30%</option>
					<option value="40">40%</option>
					<option value="50">50%</option>
					<option value="60">60%</option>
					<option value="70">70%</option>
					<option value="80">80%</option>
					<option value="90">90%</option>
					<option value="100">100%</option>
				</select>
			</div>

			<div class="blendModeSection settingsSection">
				<select id="blendModeSelect" class="blendModeSelect" title="Blend mode">
					<option value="" class="hidden"></option>
					<option value="normal" selected>Normal</option>
					<option value="multiply">Multiply</option>
					<option value="screen">Screen</option>
					<option value="overlay">Overlay</option>
					<option value="soft-light">Soft-Light</option>
					<option value="hard-light">Hard-Light</option>
					<option value="color-dodge">Color-Dodge</option>
					<option value="color-burn">Color-Burn</option>
					<option value="darken">Darken</option>
					<option value="lighten">Lighten</option>
					<option value="differende">Difference</option>
					<option value="exclusion">Exclusion</option>
					<option value="hue">Hue</option>
					<option value="saturation">Saturation</option>
					<option value="luminosity">Luminosity</option>
					<option value="color">Color</option>
					<option value="add">Add</option>
					<option value="subtract">Subtract</option>
					<option value="average">Average</option>
					<option value="pin-light">Pin-Light</option>
					<option value="negation">Negation</option>
					<option value="source-over">Source-Over</option>
					<option value="source-in">Source-In</option>
					<option value="source-atop">Source-Atop</option>
					<option value="destination-over">Destination-Over</option>
					<option value="destination-in">Destination-In</option>
					<option value="destination-out">Destination-Out</option>
					<option value="destination-atop">Destination-Atop</option>
					<option value="lighter">Lighter</option>
					<option value="darker">Darker</option>
					<option value="copy">Copy</option>
					<option value="xor">XOR</option>
				</select>
			</div>

			<div class="strokeSection settingsSection">
				<label class="strokeLabel">Stroke</label>
				<input type="number"  min="0" maxlength="3" id="strokeInput" value="1" class="strokeInput"/>
				<div class="strokeButtons">
					<button class="inputHelper increase" id="increaseStrokeWidthButton">▴</button>
					<button class="inputHelper decrease" id="decreaseStrokeWidthButton">▾</button>
				</div>
			</div>
		</div>
		
		
		<div id="fontSettingsBar" class="settingsBar hidden">
			<div class="fontFamilySection settingsSection">
				<label class="fontFamilyLabel">Font</label>
				<select id="fontFamilySelect" class="fontFamilySelect">
					<option class="hidden" value=""></option>
					<option value="sans-serif" selected>Sans Serif</option>
					<option value="Courier New">Courier New</option>
					<option value="cubano">Cubano</option>
					<option value="Droid Sans">Droid Sans</option>
					<option value="Droid Serif">Droid Serif</option>
					<option value="Georgia">Georgia</option>
					<option value="museo-slab">Museo Slab</option>
					<option value="Times">Times New Roman</option>
					<option value="Verdana">Verdana</option>
				</select>
			</div>
			
			<div class="fontWeightSection settingsSection">
				<select id="fontWeightSelect" class="fontWeightSelect">
					<option class="hidden" value=""></option>
					<option value="normal" selected>Normal</option>
					<option value="italic">Italic</option>
					<option value="bold">Bold</option>
					<option value="italic bold">Bold Italic</option>
				</select>
			</div>
			
			<div class="fontSizeSection settingsSection">
				<select id="fontSizeSelect" class="fontSizeSelect">
					<option class="hidden" value=""></option>
					<option value="8">8 Pt</option>
					<option value="10">10 Pt</option>
					<option value="12">12 Pt</option>
					<option value="14">14 Pt</option>
					<option value="16">16 Pt</option>
					<option value="18">18 Pt</option>
					<option value="24">24 Pt</option>
					<option value="32" selected>32 Pt</option>
					<option value="48">48 Pt</option>
					<option value="64">64 Pt</option>
					<option value="128">128 Pt</option>
				</select>
			</div>
		</div>
	</div>
	
	<div id="statusBar" class="statusBar">
		<!-- Zoom Container -->
		<div class="zoomContainer toolbarSection">
			<label class="zoomLabel">Zoom</label>
			<input type="number"  min="0" max="6000" maxlength="4" id="zoomInput" value="100" class="zoomInput comboInput"/>
			<select id="zoomSelect" class="zoomSelect comboSelect">
				<option class="hidden" selected value=""></option>
				<option value="10">1000%</option>
				<option value="5">500%</option>
				<option value="3">300%</option>
				<option value="2">200%</option>
				<option value="1.5">150%</option>
				<option value="1">100%</option>
				<option value="0.5">50%</option>
				<option value="0.2">20%</option>
				<option value="0.1">10%</option>
			</select>
		</div>
		
	</div>
	
	<div id="codeEditorContainer" class="codeEditorContainer hidden">
		<nav class="codeEditorButtons appNav">
			<ul class="topMenu">
				<li id="runScriptButton" class="runScriptButton">Run</li>
				<li id="closeScriptButton" class="closeScriptButton">Close</li>
				<li id="clearConsoleButton" class="clearConsoleButton">Clear Console</li>
			</ul>
		</nav>
		<textarea id="codeEditorArea" class="codeEditorArea">console.log('Hello World!');</textarea>
		<div class="consoleOutput" id="consoleOutput"></div>
	</div>
	
	<div id="menuInputBlocker" class="menuInputBlocker hidden"></div>
	<div id="colorInputBlocker" class="colorInputBlocker hidden"></div>
		
	<!-- libraries -->
	<script src="js/lib/paper-full.js"></script>
	<script src="js/lib/jquery-1.11.1.min.js"></script>
	<script src="js/lib/jquery-ui.min.js"></script>
	<script src="js/lib/jquery-extensions.js"></script>
	
	<script src="js/lib/importexport/filesaver.js"></script>
	<script src="js/lib/importexport/canvas-toBlob.js"></script>
	<script src="js/lib/importexport/jquery.iframe-transport.js"></script>
	<script src="js/lib/importexport/jquery.fileupload.js"></script>
	<script src="js/lib/importexport/jquery.fileupload-process.js"></script>
	<script src="js/lib/importexport/jquery.fileupload-validate.js"></script>
	
	<script src="js/lib/colorpicker/spectrum.js"></script>
	<script src="js/lib/jstorage.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js"></script>

	<!-- application -->
	<script src="js/init.js"></script>
	<script src="js/settings.js"></script>
	<script src="js/document.js"></script>
	<script src="js/view.js"></script>
	<script src="js/item.js"></script>
	<script src="js/group.js"></script>
	<script src="js/layer.js"></script>
	<script src="js/selection.js"></script>
	<script src="js/hover.js"></script>
	<script src="js/order.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/input.js"></script>
	<script src="js/guides.js"></script>
	<script src="js/toolbar.js"></script>
	<script src="js/settingsbar.js"></script>
	<script src="js/style.js"></script>
	<script src="js/tools.js"></script>
	<script src="js/math.js"></script>
	<script src="js/edit.js"></script>
	<script src="js/compoundPath.js"></script>
	<script src="js/undo.js"></script>
	<script src="js/codeEditor.js"></script>
	
	<script src="js/helper.js" type="text/paperscript" canvas="paperCanvas"></script>
	<!-- tools -->
	<?php loadToolScripts(); ?>
	<!-- dev -->
	<script src="js/dev.js"></script>
</body>
</html>

<?php 
	function loadToolScripts() {
		$js = '';
		$handle = opendir('js/tools');
		$file = '';
		// open the "js" directory
		if ($handle) {
			// list directory contents
			while (false !== ($file = readdir($handle))) {
				// only grab file names
				if (is_file('js/tools/' . $file)) {
					// insert HTML code for loading Javascript files
					$js .= '<script src="js/tools/' . $file . '" type="text/paperscript" canvas="paperCanvas"></script>' . "\n";
				}
			}
			closedir($handle);
			echo $js;
		}
	}
