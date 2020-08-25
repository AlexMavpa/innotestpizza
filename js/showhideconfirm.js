function confirmpizzalogout(){
var agree = confirm("Are you sure you wish to logout?");
if(agree){
return true;
}else{
return false;
}
}

    document.getElementById('logintab').onclick = function() {
      document.getElementById('modal-body').style.display='block';
      document.getElementById('modal-body2').style.display='none';
      document.getElementById('modal-body3').style.display='none';
      document.getElementById('registertab').style.color='#f8b600';
      document.getElementById('registertab').style.borderBottom ='none';
      document.getElementById('logintab').style.color='#1C8EE0';
      document.getElementById('logintab').style.borderBottom ='solid';
    }
    document.getElementById('registertab').onclick = function() {
      document.getElementById('modal-body').style.display='none';
      document.getElementById('modal-body2').style.display='block';
      document.getElementById('modal-body3').style.display='none';
      document.getElementById('registertab').style.color='#1C8EE0';
      document.getElementById('registertab').style.borderBottom ='solid';
      document.getElementById('logintab').style.color='#f8b600';
      document.getElementById('logintab').style.borderBottom ='none';
    }
    
    document.getElementById('forgottab').onclick = function() {
      document.getElementById('modal-body').style.display='none';
      document.getElementById('modal-body2').style.display='none';
      document.getElementById('modal-body3').style.display='block';
      document.getElementById('registertab').style.color='#f8b600';
      document.getElementById('registertab').style.borderBottom ='none';
      document.getElementById('logintab').style.color='#1C8EE0';
      document.getElementById('logintab').style.borderBottom ='solid';
    }
    
    document.getElementById('closecart').onclick = function() {
    document.getElementById('showcart').style.display='none';
     }
    document.getElementById('closecartmobile').onclick = function() {
    document.getElementById('showcartmobile').style.display='none';
     }
    
    function visiblePass() {
  var x = document.getElementById("userpassword");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById('passeye').style.backgroundImage = "url('/img/eyesmall1.png')";
  } else {
    x.type = "password";
    document.getElementById('passeye').style.backgroundImage = "url('/img/eyesmall2.png')";
  }
}
