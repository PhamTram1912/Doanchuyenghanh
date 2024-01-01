$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});

function isEmail(emailStr) {
    var emailPat = /^(.+)@(.+)$/
    var specialChars = "\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
    var validChars = "\[^\\s" + specialChars + "\]"
    var quotedUser = "(\"[^\"]*\")"
    var ipDomainPat = /^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
    var atom = validChars + '+'
    var word = "(" + atom + "|" + quotedUser + ")"
    var userPat = new RegExp("^" + word + "(\\." + word + ")*$")
    var domainPat = new RegExp("^" + atom + "(\\." + atom + ")*$")
    var matchArray = emailStr.match(emailPat)
    if (matchArray == null) {
        return false
    }
    var user = matchArray[1]
    var domain = matchArray[2]

    // See if "user" is valid
    if (user.match(userPat) == null) {
        return false
    }
    var IPArray = domain.match(ipDomainPat)
    if (IPArray != null) {
        // this is an IP address
        for (var i = 1; i <= 4; i++) {
            if (IPArray[i] > 255) {
                return false
            }
        }
        return true
    }
    var domainArray = domain.match(domainPat)
    if (domainArray == null) {
        return false
    }

    var atomPat = new RegExp(atom, "g")
    var domArr = domain.match(atomPat)
    var len = domArr.length

    if (domArr[domArr.length - 1].length < 2 ||
        domArr[domArr.length - 1].length > 3) {
        return false
    }

    if (len < 2) {
        return false
    }

    return true;
}
$(document).ready(function()
{
    $('#contactForm').submit(function(){
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var re_password = $("#re_password").val();
        var phone = $("#phone").val();

        var flag=true;
        //name
        if (name == ''){
            $('#phone_error').text('Bạn chưa nhập tên');
            flag = false;
        }
        else{
            $('#phone_error').text('');
        }

        //email
        if (!isEmail(email)){
            $('#email_error').text('Email không được để trống và phải đúng định dạng');
            flag = false;
        }
        else{
            $('#email_error').text('');
        }

        //phone
        if (phone == '' || phone.length < 10){
            $('#phone_error').text('Số điện thoại không hợp lệ');
            flag = false;
        }
        else{
            $('#phone_error').text('');
        }

        //password
        if (password==''){
            $('#password_error').text('Bạn chưa nhập mật khẩu');
            flag = false;
        }
        else{
            $('#password_error').text('');
        }
 
        // Re password
        if (password != re_password){
            $('#re_password_error').text('Mật khẩu nhập lại không đúng');
            flag = false;
        }
        else{
            $('#re_password_error').text('');
        }
        return flag;
    });
});
function submitForm() {
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var phone = $("#phone").val();


    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "name=" + name + "&email=" + email + "&password=" + password + "&phone=" + phone,
        success: function (text) {
            if (text == "success") {
                formSuccess();
            } else {
                formError();
                submitMSG(false, text);
            }
        }
    });
}


function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!")
}

function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}