(function($) {
$.fn.numeric = function(options, callback)
{
    var options = options || {};
	var decimal = (options.decimal === false) ? "" : decimal || ".";
    var minValue = typeof options.minValue  == 'undefined' ? null : options.minValue;
    var maxValue = typeof options.maxValue  == 'undefined' ? null : options.maxValue;
	callback = typeof callback == "function" ? callback : function(){};
	return this.data("numeric.decimal", decimal).data("numeric.minValue", minValue).data("numeric.maxValue", maxValue).data("numeric.callback", callback).keypress($.fn.numeric.keypress).keyup($.fn.numeric.keyup).blur($.fn.numeric.blur);
}

$.fn.numeric.keypress = function(e)
{
	var decimal = $.data(this, "numeric.decimal");
	var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
	// allow enter/return key (only when in an input box)
	if(key == 13 && this.nodeName.toLowerCase() == "input")
	{
		return true;
	}
	else if(key == 13)
	{
		return false;
	}
	var allow = false;
	// allow Ctrl+A
	if((e.ctrlKey && key == 97 /* firefox */) || (e.ctrlKey && key == 65) /* opera */) return true;
	// allow Ctrl+X (cut)
	if((e.ctrlKey && key == 120 /* firefox */) || (e.ctrlKey && key == 88) /* opera */) return true;
	// allow Ctrl+C (copy)
	if((e.ctrlKey && key == 99 /* firefox */) || (e.ctrlKey && key == 67) /* opera */) return true;
	// allow Ctrl+Z (undo)
	if((e.ctrlKey && key == 122 /* firefox */) || (e.ctrlKey && key == 90) /* opera */) return true;
	// allow or deny Ctrl+V (paste), Shift+Ins
	if((e.ctrlKey && key == 118 /* firefox */) || (e.ctrlKey && key == 86) /* opera */
	|| (e.shiftKey && key == 45)) return true;
	// if a number was not pressed
	if(key < 48 || key > 57)
	{
		/* '-' only allowed at start */
		if(key == 45 && this.value.length == 0) return true;
		/* only one decimal separator allowed */
		if(decimal && key == decimal.charCodeAt(0) && this.value.indexOf(decimal) != -1)
		{
			allow = false;
		}
		// check for other keys that have special purposes
		if(
			key != 8 /* backspace */ &&
			key != 9 /* tab */ &&
			key != 13 /* enter */ &&
			key != 35 /* end */ &&
			key != 36 /* home */ &&
			key != 37 /* left */ &&
			key != 39 /* right */ &&
			key != 46 /* del */
		)
		{
			allow = false;
		}
		else
		{
			// for detecting special keys (listed above)
			// IE does not support 'charCode' and ignores them in keypress anyway
			if(typeof e.charCode != "undefined")
			{
				// special keys have 'keyCode' and 'which' the same (e.g. backspace)
				if(e.keyCode == e.which && e.which != 0)
				{
					allow = true;
					// . and delete share the same code, don't allow . (will be set to true later if it is the decimal point)
					if(e.which == 46) allow = false;
				}
				// or keyCode != 0 and 'charCode'/'which' = 0
				else if(e.keyCode != 0 && e.charCode == 0 && e.which == 0)
				{
					allow = true;
				}
			}
		}
		// if key pressed is the decimal and it is not already in the field
		if(decimal && key == decimal.charCodeAt(0))
		{
			if(this.value.indexOf(decimal) == -1)
			{
				allow = true;
			}
			else
			{
				allow = false;
			}
		}
	}
	else
	{
		allow = true;
	}
	return allow;
}

$.fn.numeric.keyup = function()
{
	var minValue = $.data(this, "numeric.minValue");
	var maxValue = $.data(this, "numeric.maxValue");

    //console.log("minValue=", minValue);
    //console.log("maxValue=", maxValue);

	if (typeof minValue != 'undefined' && minValue != null) {
        //console.log("minValue != false ");
        if (parseFloat($(this).val()) < parseFloat(minValue)) {
            $(this).val(minValue).focus().select();
            //console.log("minValue<", minValue);
        } else {
            //console.log("else minValue ", minValue);
        }
    } else {
        //console.log("minValue == false ");
    }
    if (typeof maxValue != 'undefined' && maxValue != null) {
        //console.log("maxValue != false ");
        if (parseFloat($(this).val()) > parseFloat(maxValue)) {
            $(this).val(maxValue).focus().select();
            //console.log("maxValue>", maxValue);
        } else {
            //console.log("else maxValue ", minValue);
        }
    } else {
        //console.log("maxValue == false ");
    }
}

$.fn.numeric.blur = function()
{
	var decimal = $.data(this, "numeric.decimal");
	var callback = $.data(this, "numeric.callback");

	var val = $(this).val();
    if ($.trim(val).length == 0)
        val = 0;
    $(this).val(parseFloat(val));
	if(val != "")
	{
		var re = new RegExp("^\\d+$|\\d*" + decimal + "\\d+");
		if(!re.exec(val))
		{
			callback.apply(this);
		}
	}
}

$.fn.removeNumeric = function()
{
	return this.data("numeric.decimal", null).data("numeric.callback", null).unbind("keypress", $.fn.numeric.keypress).unbind("blur", $.fn.numeric.blur);
}

})(jQuery);