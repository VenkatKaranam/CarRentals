function validate(){
    var u=document.form.username.value;
    var p=document.form.password.value;
    if((u.trim()).length==0){
         document.getElementById('warn').innerHTML="<h5 class='font error'>Enter Username</h5>";
        return false;
    }
    else if((p.trim()).length==0){
         document.getElementById('warn').innerHTML="<h5 class='font error'>Enter Password</h5>";
        return false;
    }
    else{
        return true;
    }
}