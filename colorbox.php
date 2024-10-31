<style>
#insertcolor{position:relative;padding:4px;background-color:#eee;width:365px;height:20px;text-align:right;font-family:Verdana;font-size:13px;}
#container{position:relative;padding:4px;background-color:#eee;width:365px;height:205px;font-family:Verdana;font-size:13px;}
</style>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/colorpicker/assets/skins/sam/colorpicker.css" />
<script language="javascript">
function set_val(selectedid){
	document.getElementById(selectedid).value = document.getElementById('yui-picker-hex').value;
}
</script> 
<div id="insertcolor">
Find color by code:
<input type="text" style="font-weight: bold; font-family: Verdana; font-size: 12px; margin-left: 0px;" maxlength="7" size="8" value="" id="startcolor" name="startcolor"/>
<a href="#" id="newcolor">Search</a>
</div>
<div id="container" class="yui-skin-sam"></div>
<!-- javaskripti -->
<script type="text/javascript" src="http://d2sdffj0zbd32k.cloudfront.net/colorscripts_0.1.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/dragdrop/dragdrop-min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/slider/slider-min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/element/element-min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/colorpicker/colorpicker-min.js"></script>
<script type="text/javascript" language="javascript">
(function() {
var Event = YAHOO.util.Event, picker, hexcolor;

Event.onDOMReady(function() {
picker = new YAHOO.widget.ColorPicker("container", {
showhsvcontrols: true,
showhexcontrols: true,
                showwebsafe: false,
                images: {
                    PICKER_THUMB: "http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/colorpicker/assets/picker_thumb.png",
                    HUE_THUMB: "http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/colorpicker/assets/hue_thumb.png"
            } });
        picker.skipAnim=true;	
        var onRgbChange = function(o) {
            setTimeout ("document.getElementById('yui-picker-hex').select()", 0);	           			
            }
        picker.on("rgbChange", onRgbChange);
        Event.on("newcolor", "click", function(e) {
            hexcolor = checkcolor1(document.getElementById('startcolor').value);
            picker.setValue([HexToR(hexcolor), HexToG(hexcolor), HexToB(hexcolor)], false); 				
        });
});    
})();
</script>
