
function validate(){

    var vm=document.form.vmodel.value;
    var vn=document.form.vnumber.value;
    var vc=document.form.vcapacity.value;
    var rpd=document.form.rpd.value;
    if((vm.trim()).length==0 || (vn.trim()).length==0 ||(vc.trim()).length==0 || (rpd.trim()).length==0) {
        document.getElementById('warn').innerHTML="<h5 class='font error'>Fill all fields</h5>";
        return false;
    }
    else{
        return true;
    }
}

function valid(){
    var n=document.cform.noofdays.value;
    var d=document.cform.date.value;
    if(n==0 || d==0){
        document.getElementById('warn').innerHTML="<h5 class='font error'>Fill all Fields</h5>";
        return false;
    }
    else{
        return true;
    }
    

}