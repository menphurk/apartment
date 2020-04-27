function showRegisterForm(){
	$('.loginBox').fadeOut('fast',function(){
		$('.registerBox').fadeIn('fast');
		$('.login-footer').fadeOut('fast',function(){
			$('.register-footer').fadeIn('fast');
		});
		$('.modal-title').html('ลงทะเบียน');
	});
	$('.error').removeClass('alert alert-danger').html('');

}
function showLoginForm(){
	$('#LoginMember .registerBox').fadeOut('fast',function(){
		$('.loginBox').fadeIn('fast');
		$('.register-footer').fadeOut('fast',function(){
			$('.login-footer').fadeIn('fast');
		});

		$('.modal-title').html('เข้าสู่ระบบ');
	});
	$('.error').removeClass('alert alert-danger').html('');
}

function openLoginModal(){
	showLoginForm();
	setTimeout(function(){
		$('#LoginMember').modal('show');
	}, 230);

}
function openRegisterModal(){
	showRegisterForm();
	setTimeout(function(){
		$('#LoginMember').modal('show');
	}, 230);

}

function shakeModal(){
	$('#LoginMember .modal-dialog').addClass('shake');
	$('.error').addClass('alert alert-danger').html("Invalid email/password combination");
	$('input[type="password"]').val('');
	setTimeout( function(){
		$('#LoginMember .modal-dialog').removeClass('shake');
	}, 1000 );
}


