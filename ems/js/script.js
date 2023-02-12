jQuery(document).ready(function()
{
	autoFit();
	if(jQuery(document).has("#login"))
	{
		jQuery("#login").submit(
			function(event){
				validateControl(event);
			}
		);
	}
	function validateControl(event)
	{
		event.preventDefault();
		if(jQuery("#inputUser").val() == "")
		{
			jQuery("#error").html("Enter Username");
			jQuery("#inputUser").css("border","1px solid #ff0000");
			jQuery("#inputUser").focus();
			return;
		}
		else
		{
			jQuery("#inputUser").css("border","1px solid #00ff00");
		}
		if(jQuery("#inputPassword").val() == "")
		{
			jQuery("#error").html("Enter Password");
			jQuery("#inputPassword").css("border","1px solid #ff0000");
			jQuery("#inputPassword").focus();
			return;
		}
		else
		{
			jQuery("#inputPassword").css("border","1px solid #00ff00");
		}
		jQuery.post(jQuery("#login").attr('action'), {username: jQuery("#inputUser").val(), password: jQuery("#inputPassword").val()}, function(data, status){
			if(data == "failed")
			{
				jQuery("#inputUser").focus();
				jQuery("#error").html("Invalid Credentials");
				return;
			}
			else
			{
				jQuery("#container").empty();
				jQuery.post(data, {}, function(data1, status1){
					jQuery("#container").html(data1);
				});
			}
		});
	}
});
function autoFit()
{
	jQuery(".sidebar").css("height","auto");
	jQuery(".sidebar").css("height",(jQuery(document).height() - 100) + "px");
	jQuery('body').bind("DOMSubtreeModified",function(){
	  jQuery(".sidebar").css("height",(jQuery(document).height() - 100) + "px");
	});
}
function loadData(urls, object, element)
{
	var outVal = "success";
	jQuery.ajax({
		method: "post",
		url: urls,
		dataType : "html",
		data : object,
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		timeout: (2 * 1000),
		success: function(data, success, xhr)
		{
			var ct = xhr.getResponseHeader("content-type") || "";
			if (ct.indexOf('html') > -1) 
			{
				jQuery(element).html(data);
				if(element == "#state")
				{
					loadCity();
				}
				outVal = "success";
			}
			else
			{
				outVal = data;
			}
		},
		error: function( objAJAXRequest, strError ){
			outVal = "error";
		},
		async: false
	});
	return outVal;	
}
function loopControls(bool, form)
{
	jQuery(form).find("input, textarea, select").each(function()
	{
		bool = checkData(bool, jQuery(this));
	});
	return bool;
}
function checkData(bool, element)
{
	if(!element.is(':disabled'))
	{
		var dataMaxLen = element.attr("data-max-length");
		var dataMinLen = element.attr("data-min-length");
		var isRequired = element.attr("data-required");
		var type = element.attr("data-type");
		var value = element.val().trim();
		
		if(isRequired == "true" && isRequired != undefined)
		{
			if(value == "")
			{
				element.parent().find("span").html("Please enter " + element.parent().find("label").html());
				element.css("border","1px solid #ff0000");
				bool = false;
			}
			else if(dataMaxLen != undefined && dataMinLen != undefined)
			{
				if(element.val().length > dataMaxLen || element.val().length < dataMinLen)
				{
					element.parent().find("span").html("Enter between " + dataMinLen + " - " + dataMaxLen + " Char.");
					element.css("border","1px solid #ff0000");
					bool = false;
				}
				else
				{
					element.parent().find("span").html("");
					element.css("border","1px solid #ccc");
				}
			}
			else
			{
				element.parent().find("span").html("");
				element.css("border","1px solid #ccc");
			}
		}
		if(value != "")
		{
			switch(type)
			{
				case "email":
					var regex = RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
					if(!regex.test(value))
					{
						element.parent().find("span").html("Email is Invalid");
						element.css("border","1px solid #ff0000");
						bool = false;
					}
					else if(dataMaxLen != undefined && dataMinLen != undefined)
					{
						if(element.val().length > dataMaxLen || element.val().length < dataMinLen)
						{
							element.parent().find("span").html("Enter between " + dataMinLen + " - " + dataMaxLen + " Char.");
							element.css("border","1px solid #ff0000");
							bool = false;
						}
						else
						{
							element.parent().find("span").html("");
							element.css("border","1px solid #ccc");
						}
					}
					else
					{
						element.parent().find("span").html("");
						element.css("border","1px solid #ccc");
					}
				break;
				case "number":
					var regex = RegExp(/^([0-9])+$/);
					if(!regex.test(value))
					{
						element.parent().find("span").html("Please Enter Numbers Only");
						element.css("border","1px solid #ff0000");
						bool = false;
					}
					else if(dataMaxLen != undefined && dataMinLen != undefined)
					{
						if(element.val().length > dataMaxLen || element.val().length < dataMinLen)
						{
							element.parent().find("span").html("Enter between " + dataMinLen + " - " + dataMaxLen + " Char.");
							element.css("border","1px solid #ff0000");
							bool = false;
						}
						else
						{
							element.parent().find("span").html("");
							element.css("border","1px solid #ccc");
						}
					}
					else
					{
						element.parent().find("span").html("");
						element.css("border","1px solid #ccc");
					}
				break;
				case "percent":
					var regex = RegExp(/^\d+(%?\d)?(.?\d)?/g);
					if(!regex.test(value))
					{
						element.parent().find("span").html("Please Enter Numbers Only");
						element.css("border","1px solid #ff0000");
						bool = false;
					}
					else if(dataMaxLen != undefined && dataMinLen != undefined)
					{
						if(element.val().length > dataMaxLen || element.val().length < dataMinLen)
						{
							element.parent().find("span").html("Enter between " + dataMinLen + " - " + dataMaxLen + " Char.");
							element.css("border","1px solid #ff0000");
							bool = false;
						}
						else
						{
							element.parent().find("span").html("");
							element.css("border","1px solid #ccc");
						}
					}
					else
					{
						element.parent().find("span").html("");
						element.css("border","1px solid #ccc");
					}
				break;
				case "currency":
					var regex = RegExp(/^-?(\d*\.)?\d*$/);
					if(!regex.test(value))
					{
						element.parent().find("span").html("Please Enter Number & Decimal Only");
						element.css("border","1px solid #ff0000");
						bool = false;
					}
					else if(dataMaxLen != undefined && dataMinLen != undefined)
					{
						if(element.val().length > dataMaxLen || element.val().length < dataMinLen)
						{
							element.parent().find("span").html("Enter between " + dataMinLen + " - " + dataMaxLen + " Char.");
							element.css("border","1px solid #ff0000");
							bool = false;
						}
						else
						{
							element.parent().find("span").html("");
							element.css("border","1px solid #ccc");
						}
					}
					else
					{
						element.parent().find("span").html("");
						element.css("border","1px solid #ccc");
					}
				break;
				case "alphanumeric":
					var regex = RegExp(/^[a-zA-Z0-9-_]+$/);
					if(!regex.test(value))
					{
						element.parent().find("span").html("Username should be Alpha Numeric");
						element.css("border","1px solid #ff0000");
						bool = false;
					}
					else
					{
						if(element.parent().find("span").html() == "Username should be Alpha Numeric")
						{
							element.parent().find("span").html("");
							element.css("border","1px solid #ccc");
						}
					}
				break;
			}
		}
	}
	return bool;
}
function validateForm(form)
{
	bool = true;
	bool = loopControls(bool, form);
	if(jQuery("#newPassword").length > 0)
	{
		if (jQuery("#newPassword").val() != jQuery("#retypePassword").val())
		{
			jQuery("#retypePassword").parent().find("span").html("Passwords do not Match");
			jQuery("#retypePassword").css("border","1px solid #ff0000");
			bool = false;
		}
		else
		{
			if(jQuery("#retypePassword").parent().find("span").html() == "Passwords do not Match")
			{
				jQuery("#retypePassword").parent().find("span").html("");
				jQuery("#retypePassword").css("border","1px solid #ccc");
			}
		}
	}
	if(bool)
	{
		if (jQuery("#username").length > 0) 
		{
			if (jQuery("#password").val() != jQuery("#rePassword").val())
			{
				jQuery("#rePassword").parent().find("span").html("Passwords do not Match");
				jQuery("#rePassword").css("border","1px solid #ff0000");
				bool = false;
			}
			else
			{
				if(jQuery("#rePassword").parent().find("span").html() == "Passwords do not Match")
				{
					jQuery("#rePassword").parent().find("span").html("");
					jQuery("#rePassword").css("border","1px solid #ccc");
				}
			}
			if (jQuery("#username").val() != "")
			{
				if(jQuery("#username").parent().find("span").html() == "")
				{
					var jqxhr = jQuery.post(jQuery(form).attr("action"), {userexist: jQuery("#username").val()}, function(data, status){
						if(data.trim() == "true")
						{
							jQuery("#username").parent().find("span").html("Oops... username not available, choose another");
							jQuery("#username").css("border","1px solid #ff0000");
						}
						else
						{
							if (jQuery("#registration_id").length > 0) 
							{
								jQuery.post(jQuery("form").attr("action"), {registerexist: jQuery("#registration_id").val()}, function(data, status)
								{
									if(data.trim() == "true")
									{
										jQuery("#registration_id").parent().find("span").html("Reg. Id is Exists");
										jQuery("#registration_id").css("border", "1px solid #ff0000");
										bool = false;
									}
									else
									{
										loadData(jQuery(form).attr("action"), jQuery(form).serialize(), "#rightContainer");
									}
								});
							}
							else
							{
								loadData(jQuery(form).attr("action"), jQuery(form).serialize(), "#rightContainer");
							}
						}
					});
				}
			}
		}
		else
		{
			loadData(jQuery(form).attr("action"), jQuery(form).serialize(), "#rightContainer");
		}
	}
	return false;
}
var timeSet = null;
function activateIconButtons()
{
	clearInterval(timeSet);
	jQuery(document).ready(function(){
		jQuery(".paging li a").unbind("click");
		jQuery(".paging li a").click(function(event){
			event.stopPropagation();
			event.preventDefault();
			if(!jQuery(this).hasClass("disabled"))
			{
				loadData(jQuery(this).attr("href"), {navigation:jQuery(this).attr("data-nav"), currentPage:jQuery(this).attr("data-current")}, '#rightContainer');
			}
		});
		autoFit();
		jQuery(".enquirylist td").unbind("click");
		jQuery(".enquirylist td").click(function (event){
			if(jQuery(event.target).prop("tagName") == "TD")
			{
				event.preventDefault();
				//loadData(jQuery(this).parent().find(".iconbtn").attr("href"), {id:jQuery(this).parent().find(".iconbtn").attr("data-id")}, '#rightContainer');
			}
		});
		jQuery(".iconbtn").unbind("click");
		jQuery(".iconbtn").click(function(event){
			event.stopPropagation();
			event.preventDefault();
			var eke = jQuery(this);
                        var loadArea = "#rightContainer";
                        
			var tarElement = jQuery(event.target);

                        if(tarElement.attr("data-target") != undefined)
			{
                               loadArea = tarElement.attr("data-target");    
                        }

			if(jQuery(event.target).attr("class") == "iconbtn")
			{
				tarElement = jQuery(this).find("i");
			}
			if(tarElement.attr("class").indexOf("fa-trash") > -1)
			{
				if(!jQuery(".alertDiv").is(':visible'))
				{
					jQuery(".alertDiv .continue").attr("data-url", eke.attr("data-url"));
					jQuery(".alertDiv .continue").attr("data-id", eke.attr("data-id"));
					jQuery(".alertDiv .continue").attr("href", eke.attr("href"));
                                        jQuery(".alertDiv .continue").attr("data-target", eke.attr("data-target"));
					jQuery(".alertDiv").fadeIn();
					return;
				}
			}
			else if(tarElement.attr("class").indexOf("fa-user-times") > -1)
			{
				if(!jQuery(".alertDiv").is(':visible'))
				{
					jQuery(".alertDiv .continue").attr("data-url", eke.attr("data-url"));
					jQuery(".alertDiv .continue").attr("data-id", eke.attr("data-id"));
					jQuery(".alertDiv .continue").attr("href", eke.attr("href"));
					jQuery(".alertDiv").fadeIn();
					return;
				}
			}
			else if(jQuery(".alertDiv").is(':visible'))
			{
				if(tarElement.attr("class").indexOf("continue") > -1)
				{
					loadData(jQuery(".alertDiv .continue").attr("href"), {id:jQuery(".alertDiv .continue").attr("data-id"), value:checked, url:jQuery(".alertDiv .continue").attr("data-url")}, loadArea );
					jQuery(".alertDiv .continue").removeAttr("href");
					jQuery(".alertDiv .continue").removeAttr("data-id");
					jQuery(".alertDiv .continue").removeAttr("data-url");
					jQuery(".alertDiv").fadeOut();
				}
				else(jQuery(event.target).attr("class").indexOf("cancel") > -1)
				{
					jQuery(".alertDiv .continue").removeAttr("href");
					jQuery(".alertDiv .continue").removeAttr("data-id");
					jQuery(".alertDiv .continue").removeAttr("data-url");
					jQuery(".alertDiv").fadeOut();
				}
				return;
			}
			var element = jQuery(this).parent().parent().find(".his_only");
			var checked = 1;
			if(element.prop("tagName") != undefined)
			{
				if(element.prop("checked"))
				{
					checked = 0;
				}
				loadData(jQuery(this).attr("href"), {id:jQuery(this).attr("data-id"), value:checked, url:jQuery(this).attr("data-url")}, loadArea);
			}
			else
			{
				loadData(jQuery(this).attr("href"), {id:jQuery(this).attr("data-id"), url:jQuery(this).attr("data-url")}, loadArea );
			}
		});
		jQuery(".hisonly").change(function(){
			var checked = 1;
			if(jQuery(this).prop("checked"))
			{
				checked = 0;
			}
			loadData(jQuery(this).attr("data-action"), {id:jQuery(this).attr("data-id"), value:checked, url:jQuery(this).attr("data-url")}, '#rightContainer');
		});
	});
}
function validateSubjects(ctrlInput)
{
	if(ctrlInput.val() == "")
	{
		ctrlInput.parent().find("span").html("Please enter " + ctrlInput.parent().find("label").html());
		ctrlInput.css("border","1px solid #ff0000");
		return false;
	}
	else if(!checkData(true, ctrlInput))
	{
		return false;
	}
	else
	{
		ctrlInput.parent().find("span").html("");
		ctrlInput.css("border","1px solid #ccc");
		return true;
	}
}
function loadSubfeatures(baseURL)
{
	jQuery(".subFeatures li a").unbind("click");
	jQuery(".subFeatures li a").click(function(event){
		event.preventDefault();
		var element = this;
		jQuery("ul.subFeatures li i").css("color","#fff");
		jQuery(this).find("i").css("color","#00FFF5");
		jQuery.post(baseURL + jQuery(this).attr("href"), {}, function(data, success){
			if(jQuery(element).attr("href") == "dashboard")
			{
				jQuery('#container').html(data);
			}
			else
			{
				jQuery('#rightContainer').html(data);
			}
		});
	});
}
Date.prototype.yyyymmdd = function() {
	var yyyy = this.getFullYear().toString();
	var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
	var dd  = this.getDate().toString();
	return yyyy + '-' + (mm[1]?mm:"0"+mm[0]) + '-' + (dd[1]?dd:"0"+dd[0]); // padding
};