function validate(){
    var u=document.form.username.value;
    var r1=document.getElementById('c');
    var r2=document.getElementById('a');
    var psd=document.form.password.value;
    var cpsd=document.form.cpassword.value;
    var s=document.form.s_question.value;
    var sa=document.form.s_answer.value;
    if(r1.checked==false && r2.checked==false){
        document.getElementById('warn').innerHTML="<h5 class='font error'>Select the Register type</h5>";
        return false;
    }
    else if((u.trim()).length==0 || (psd.trim()).length==0 ||(cpsd.trim()).length==0 || (sa.trim()).length==0 || s=='Select') {
        document.getElementById('warn').innerHTML="<h5 class='font error'>Fill all fields</h5>";
        return false;
    }
    else if((u.trim()).length<6 || (u.trim()).length>15  ){
        document.getElementById('warn').innerHTML="<h5 class='font error'>username must be 6-14 letters</h5>";
        return false;
    }
    else if((psd.trim()).length<6 ){
        document.getElementById('warn').innerHTML="<h5 class='font error'>password must be 6 letters</h5>";
        return false;
    }
    else if(psd != cpsd){
        document.getElementById('warn').innerHTML="<h5 class='font error'>password not matching</h5>";
        return false;
    }
    else{
        return true;
    }

}

function fp_valid(){
    var u=document.form.username.value;
    var psd=document.form.password.value;
    var cpsd=document.form.cpassword.value;
    var s=document.form.s_question.value;
    var sa=document.form.s_answer.value;
 if((u.trim()).length==0 || (psd.trim()).length==0 ||(cpsd.trim()).length==0 || (sa.trim()).length==0 || s=='Select') {
        document.getElementById('warn').innerHTML="<h5 class='font error'>Fill all fields</h5>";
        return false;
    }
    else if((psd.trim()).length<6 ){
        document.getElementById('warn').innerHTML="<h5 class='font error'>password must be 6 letters</h5>";
        return false;
    }
    else if(psd != cpsd){
        document.getElementById('warn').innerHTML="<h5 class='font error'>password not matching</h5>";
        return false;
    }
    else{
        return true;
    }

}