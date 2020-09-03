$( "#loginform" ).submit(function( event ) {
var msg   = $('#loginform').serialize()
$.ajax({
  type: "POST",
  url: 'script.php',
  data: msg,
  success: function(data) {
  $('#results').html(data);
  }
 });
  event.preventDefault();
});

$( "#regform" ).submit(function( event ) {
var msg   = $('#regform').serialize()
$.ajax({
  type: "POST",
  url: 'regscript.php',
  data: msg,
  success: function(data) {
  $('#regresults').html(data);
  }
 });
  event.preventDefault();
});

$( "#forgotform" ).submit(function( event ) {
var msg   = $('#forgotform').serialize()
$.ajax({
  type: "POST",
  url: 'forgotscript.php',
  data: msg,
  success: function(data) {
  $('#forgotresults').html(data);
  }
 });
  event.preventDefault();
});

 $( "#userinfo" ).submit(function( event ) {
var msg   = $('#userinfo').serialize()
$.ajax({
  type: "POST",
  url: 'edituser.php',
  data: msg,
  success: function(data) {
  $('#editresults').html(data);
  }
 });
  event.preventDefault();
});

 $( "#orderform" ).submit(function( event ) {
var msg   = $('#orderform').serialize()
$.ajax({
  type: "POST",
  url: 'checkorderinfo.php',
  data: msg,
  success: function(data) {
  $('#checkresults').html(data);
  }
 });
  event.preventDefault();
});



$( "#mavchangecart" ).click(function( event ) {
document.getElementById('showcart').style.cssText= `display: block;position: absolute;top: 60px;z-index: 9999;width: 400px;right: 0px; border-radius: 15px; -moz-border-radius: 15px;`;
var msg = '0'
$.ajax({
  type: "POST",
  url: 'cartproccess.php',
  data: {
  msg : msg
  },
  success: function(data) {
  $('#cartcontents').html(data);
  if  (getCookie('cart') != null) {
   var d = unserialize(decodeURIComponent(getCookie('cart')))[2];
   var e = d.map(string => +string);
   var summa = 0;
   for (let i = 0; i < e.length; i++) {
  e[i] = +e[i];
  summa+= e[i];
  }
  $('#cartnumber').html(summa);
  }
  else {
  $('#cartnumber').html('0');
  }
  }
 });
 if (($('body').find('span#totalsum').html() == "0") || ($('body').find('span#totalsum').html() == "undefined")) {
$('button.cartbtn').prop("disabled", true);
$('.cartbtn').css('background', 'grey');
}
else
{
$('button.cartbtn').prop("disabled", false);
$('.cartbtn').css('background', '');
}
  event.preventDefault();
});

$( "#mavchangecartmobile" ).click(function( event ) {
document.getElementById('showcartmobile').style.cssText= `display: block;position: fixed;bottom: 80px;z-index: 9999;width: 350px;right: 0px; border-radius: 15px; -moz-border-radius: 15px;`;
var msg = '0'
$.ajax({
  type: "POST",
  url: 'cartproccess.php',
  data: {
  msg : msg
  },
  success: function(data) {
  $('#cartcontentsmobile').html(data);
  if  (getCookie('cart') != null) {
   var d = unserialize(decodeURIComponent(getCookie('cart')))[2];
   var e = d.map(string => +string);
   var summa = 0;
   for (let i = 0; i < e.length; i++) {
  e[i] = +e[i];
  summa+= e[i];
  }
  $('#cartnumbermobile').html(summa);
  }
  else {
  $('#cartnumbermobile').html('0');
  }
  }
 });
 if (($('body').find('span#totalsum').html() == "0") || ($('body').find('span#totalsum').html() == "undefined")) {
$('button.cartbtnmobile').prop("disabled", true);
$('.cartbtnmobile').css('background', 'grey');
}
else
{
$('button.cartbtnmobile').prop("disabled", false);
$('.cartbtnmobile').css('background', '');
}
  event.preventDefault();
});

$( "#clearcart" ).click(function( event ) {
var msg = '2'
$.ajax({
  type: "POST",
  url: 'cartproccess.php',
  data: {
  msg : msg
  },
  success: function(data) {
  $('#cartcontents').html(data);
  $('#cartcontentsmobile').html(data);
  $("#mavchangecart").trigger("click");
  $("#mavchangecartmobile").trigger("click");
  }
 });
  event.preventDefault();
});

$( "#clearcartmobile" ).click(function( event ) {
var msg = '2'
$.ajax({
  type: "POST",
  url: 'cartproccess.php',
  data: {
  msg : msg
  },
  success: function(data) {
  $('#cartcontentsmobile').html(data);
  $('#cartcontents').html(data);
  $("#mavchangecartmobile").trigger("click");
  $("#mavchangecart").trigger("click");
  }
 });
  event.preventDefault();
});

$( ".mavchange" ).click(function( event ) {
var clickId = $(this).attr('id');
var clickQuantity = '1';
var clickName = $(this).children("img").attr('name');
var clickPrice = $(this).parent("div").siblings(".pricediv").children(".price").html();
var msg = '1'
$.ajax({
  type: "POST",
  url: 'cartproccess.php',
  data: {
  clickId : clickId,
  clickName : clickName,
  clickQuantity : clickQuantity,
  clickPrice : clickPrice,
  msg : msg
  },
  success: function(data) {
  $('#cartcontents').html(data);
  $('#cartcontentsmobile').html(data);
   $('img.mavchangecart').attr('style', 'filter:drop-shadow(5px 5px 5px #222);');
   $('img.mavchangecartmobile').attr('style', 'filter:drop-shadow(5px 5px 5px #222);');
   $('li.showcart').attr('style', 'display: block;position: absolute;top: 60px;z-index: 9999;width: 400px;right: 0px;');
   $('div.showcartmobile').attr('style', 'display: block;position: fixed;bottom: 80px;z-index: 9999;width: 350px;right: 0px;');
  $("#mavchangecart").trigger("click"); // new
   setTimeout(function () {
$('img.mavchangecart').removeAttr('style')
}, 700);
$("#mavchangecartmobile").trigger("click"); // new
   setTimeout(function () {
$('img.mavchangecartmobile').removeAttr('style')
}, 700)
//  }
  
  }
 });
  event.preventDefault();
});

$(document).ready(function() {
        $('body').on('click','.moreless', function(){
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        var msg = '4'
        if ($button.text() == "+") {
  	  var newVal = parseFloat(oldValue) + 1;
  	  var moreid = $(this).find('span[id]').attr('id') ;
  	  $.ajax({
        type: "POST",
        url: 'cartproccess.php',
        data: {
        msg : msg,
        moreid : moreid
        },
        success: function(data) {
        $('#cartcontents').html(data);
        $('#cartcontentsmobile').html(data);
        $("#mavchangecart").trigger("click");
        $("#mavchangecartmobile").trigger("click");
        }
        });
  	} else {
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
        var lessid = $(this).find('span[id]').attr('id') ;
        $.ajax({
        type: "POST",
        url: 'cartproccess.php',
        data: {
        msg : msg,
        lessid : lessid
        },
        success: function(data) {
        $('#cartcontents').html(data);
        $('#cartcontentsmobile').html(data);
        $("#mavchangecart").trigger("click");
        $("#mavchangecartmobile").trigger("click");
        }
        });
	    } else {
        newVal = 1;
      }
	  }
    $button.parent().find("input").val(newVal);
    event.preventDefault();
    });  
    });

        $(document).ready(function() {
        $('body').on('click','.remove', function(){
         var msg = '3';
         var deleteid = $(this).find('span[id]').attr('id');
         $.ajax({
        type: "POST",
        url: 'cartproccess.php',
        data: {
        msg : msg,
        deleteid : deleteid
        },
        success: function(data) {
        $('#cartcontents').html(data);
        $('#cartcontentsmobile').html(data);
        $("#mavchangecart").trigger("click");
        $("#mavchangecartmobile").trigger("click");
        }
        });
         event.preventDefault();
         });
         });
         
  $(document).ready(function() {
        $('body').on('change','.cartinput', function(){
 var msg = '4';
 var changeid = $(this).attr('id') ;
 var quantity = $(this).val() ;
 $.ajax({
        type: "POST",
        url: 'cartproccess.php',
        data: {
        msg : msg,
        changeid : changeid,
        quantity : quantity
        },
        success: function(data) {
        $('#cartcontents').html(data);
        $('#cartcontentsmobile').html(data);
        $("#mavchangecart").trigger("click");
        $("#mavchangecartmobile").trigger("click");
        }
        }); 
 event.preventDefault();
});
});