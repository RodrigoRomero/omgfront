$(document).ready(function() {

});


function validateForm(form) {
	if(typeof form == "string") e = $('#'+form);
	if($("select[id*=right]")){
		$("select[id*=right]").each(function(n,el){
			var id = $(el).attr('id');
			$('#'+id+' option').each(function(n,ele){
			 $(ele).attr('selected','selected');
			})
		})
	}

	var validate = e.validate({
		debug: true,
		submitHandler: function () {
			frm_send($('#' + form));
		},
		errorClass: "help-inline",
		errorElement: "span",
		onblur: false,
		onkeyup: false,
		onsubmit: true,
		ignore: "",
		rules: {
			password: {
				required: true,
				minlength: 7
			},

			plan: {
				required: true,
			},

			valid_password:{
				required: true,
				equalTo: "#password",
				minlength: 7
			},
		},

		 messages: {
			plan : "Debes seleccionar un bono contribución"
		},

		highlight:function(element, errorClass, validClass) {
			$(element).parents('.fieldItemV').addClass('error');
		},

		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.fieldItemV').removeClass('error');
			$(element).parents('.fieldItemV').addClass('success');

		},
		invalidHandler: function(form, validator) {

  //   console.log($(validator.errorList[0].element).offset())

		if (!validator.numberOfInvalids())
			return;
		$('html, body').animate({
			scrollTop: $(validator.errorList[0].element).offset().top-window.navHeight

		},  1000);
	}
	});

}

var _frm_progress = false;

function frm_send(form, ajaxUrl, ajaxId, extraData) {

	if(form=="none"){
		if(ajaxUrl==undefined || ajaxId==undefined)  { console.log(102, "frm_send"); return false;}
		var form = $("<form/>", {"id" : "frm"+ajaxId, "action":ajaxUrl});
	}

	if(extraData==undefined)
		extraData = new Array();

	if (!exists(form) && form != "none") {
		console.log(102, "frm_send");
		return false;
	}

	if (_frm_progress) {
		console.log(105, "frm_send");
		return false;
	}

	if (extraData.length > 0)

		extraData = "&" + extraData.join("&")

	_frm_progress = true

	if(_frm_progress){
		page_block(true);
	}

	$.ajax({
		type : 'POST',
		url  : form.attr('action'),
		data : form.serialize() + extraData,
		success : function(data) {
			_frm_progress = false;
			page_block(false);
			data = frm_jsonDecode(data)
			switch(data.success) {

				case "true":
				case true:
				case 1:
				case "1":
					$('#'+form.attr('id')).reset();
				break;

				case "false":
				case false:
				case 0:
				break;

				case "error":
				case "-1":
				break;

				default:
					console.log(103, form.attr("id"));
					return false;
				break;
			}

			switch(data.responseType) {
				case "function":
					if (data.value == "") {
						console.log(106, form.attr("id"));
					}
					var fn = data.value
					if (window[fn] != undefined) {
						eval(fn)(data)
					} else {
						console.log(108, fn);
					}
				break;

				case "redirect":
					if (data.value == "") {
						console.log(106, form.attr("id"));
					}
					window.location.href = data.value
				break;

				default:
					console.log(104, form.attr("id"));
				break;
			}
		},
		error : function(data) {
			_frm_progress = false;
			console.log(101, form.attr("id"));
		}
	})
}


function page_block(a, el) {
	var b = $("<div/>", {
		id: "j-pg_block",
		style: "width:100%; height:100%; background:rgba(0,0,0,0.6); position:fixed; z-index:500; top:0px;"
	});

	var c = $("<div/>", {
		id: "",
		class: "progress progress-striped active",
		style: "height: 30px;  margin-top: -15px; position: absolute; top: 50%; width: 90%; margin-left:5%"
	});

	var d = $("<div/>", {
		id: "",
		class: "progress-bar",
		style: "width: 100%;  color: #FFFFFF; font-family: 'Asap',sans-serif; font-size: 15px; font-weight: bold; line-height: 30px; text-transform: uppercase;",
		text: 'Procesando Información'
	});

	if (a) {
		if (!exists($("#j-pg_block"))) {
			d.appendTo(c)
			c.appendTo(b)
			b.appendTo("body")
		}
	} else {
		if (exists($("#j-pg_block"))) {
			$("#j-pg_block").remove()
		}
	}
}

function frm_jsonDecode(data) {
	try {
		data = jQuery.parseJSON(data);
	} catch(err) {
		console.log(107, err);
		data = '{"success":"error"}';
		data = jQuery.parseJSON(data);
	}
	return data
}

function exists(el) {
	return ($(el).length > 0) ? true : false;
}


$.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}


function showNotify(data){
	console.log(data);

	if( typeof toastr === 'undefined' ) {
				console.log('notifications: Toastr not Defined.');
				return true;
			}

			toastr.remove();
			notifyPosition = data.response.position,
			notifyType = data.response.type,
			notifyMsg = data.response.message,
			notifyTimeout = data.response.time,
			notifyCloseButton = data.response.close;

			if( !notifyPosition ) { notifyPosition = 'toast-top-right'; } else { notifyPosition = 'toast-' + notifyPosition; }
			if( !notifyMsg ) { notifyMsg = 'Please set a message!'; }
			if( !notifyTimeout ) { notifyTimeout = 5000; }
			if( notifyCloseButton == 'true' ) { notifyCloseButton = true; } else { notifyCloseButton = false; }

			toastr.options.positionClass = notifyPosition;
			toastr.options.timeOut = Number( notifyTimeout );
			toastr.options.closeButton = notifyCloseButton;
			toastr.options.closeHtml = '<button><i class="icon-remove"></i></button>';

			if( notifyType == 'warning' ) {
				toastr.warning(notifyMsg);
			} else if( notifyType == 'error' ) {
				toastr.error(notifyMsg);
			} else if( notifyType == 'success' ) {
				toastr.success(notifyMsg);
			} else {
				toastr.info(notifyMsg);
			}

			return false;

}
