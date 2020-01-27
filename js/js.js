$(function() {
    var pull 		= $('.pull');
    menu 		= $('.head ul');
    menuHeight	= menu.height();
    
       $(pull).on('click', function(e) {
        e.preventDefault();
        $(this).parent().find("ul").slideToggle();
        //$(this).parent().find("ul").toggleClass('active');

    });
    
    
    $(window).resize(function(){
        var w = $(window).width();
        if(w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });

    var $menush = $("#head");

    var a = $('#siteTop').height();

    
    $(window).scroll(function(){
        if ( $(this).scrollTop() > a && !$menush.hasClass("head") ){
           $menush.addClass("head");
        } else if($(this).scrollTop() <= a && $menush.hasClass("head")) {
           $menush.removeClass("head");
        }
		
		if ( $(this).scrollTop() > 1000 ) {
			$('.toTop').addClass('active');
		} else {
			$('.toTop').removeClass('active');
		}
    });
});
			
			
$(document).ready(function(){
   

     $('a[href^="#"]').click(function(){
         if (!$(this).hasClass('fancybox')) {
             
        var qwe = 55;
        var el = $(this).attr('href');
         if ($(window).width() < 1051) {
             $('.pull').parent().find("ul").slideToggle();
			 qwe = 50;
         }
         
        $('body,html').stop().animate({
            scrollTop: $(el).offset().top-qwe}, 1000, 'easeInOutSine', function () {
        
        });
        return false; 
        }
     });
    
     $('.servscroll').click(function(){
        var qwe = 55;
      
         
        $('body,html').stop().animate({
            scrollTop: $('#service').offset().top-qwe}, 1000, 'easeInOutSine', function () {
        
        });
        return false; 
     
     });
    

    
    $('.owl-advantages').owlCarousel({
        loop:false,
        dots: true,
        navText: ['',''],
        margin:0,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
			580:{
                items:2,
                nav:false
            },
			790:{
                items:3,
                nav:false
            },
			1024:{
                items:4,
                nav:false
            }
        }
    });
	
	
    $('.owl-tarif').owlCarousel({
        loop:false,
        dots: true,
        navText: ['',''],
        margin:0,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
			400:{
                items:2,
                nav:false
            },
			600:{
                items:3,
                nav:false
            },
			768:{
                items:4,
                nav:false
            },
			1024:{
                items:5,
                nav:false
            }
        }
    });
   

    $(".fancybox").fancybox({
        padding: 0,
        autoResize : true,
        fitToView : false,
        maxWidth: "100%"
    });
  
    function treeprobel (chislo) {
        var number=chislo;
        var output='';
        number+=''; // преобразуем число в строковую переменную
        var start=number.length%3; //количество цифр не входящих в триаду
        output+=number.substr(0,start); //вставляем их сначала
        var add= (output==0)? '' : ' '; //если число кратно 3, то не нужен первый пробел
        for (var i=start;i<number.length-2;i+=3)
        {
            output+=add+number.substr(i,3);
            add=' ';
        }
        return output;
    }
	
	

    var name =  $('.name');
    var weight =  $('.weight');
    var tel =  $('.tel');
    var mail =  $('.email');
    var text =  $('.quest-text');
  
    var wew = 'Вес (кг)';
    var email = 'E-mail*';

    
    tel.val(phone);
    name.val(imya);
    text.val(qq);
    mail.val(email);
    name.focus(function(){
        if($(this).val() == imya)
            $(this).val('');
    }); 
	
    tel.focus(function(){
        if($(this).val() == phone)
            $(this).val('');
    });
    text.focus(function(){
        if($(this).val() == qq)
            $(this).val('');
    });
    mail.focus(function(){
        if($(this).val() == email)
            $(this).val('');
    });

    name.blur(function(){
        if($(this).val() == ''){
            $(this).val(imya);
        }
    });

    tel.blur(function(){
        if($(this).val() == ''){
            $(this).val(phone);
        }
    });
    text.blur(function(){
        if($(this).val() == ''){
            $(this).val(qq);
        }
    });
    mail.blur(function(){
        if($(this).val() == ''){
            $(this).val(email);
        }
    });
	
	$('.adr').change(function(){
		weight.val('');
		$('#result1').html('');
		if ($('.adr').val() === 'kz' || $('.adr').val() === 'kg') {
			$('.rucities').slideUp();
		} else if ($('.adr').val() === 'ru') {
			$('.rucities').slideDown();
		}
	});
	
	$('.rucities').change(function(){
		weight.val('');
		$('#result1').html('');
	});
	
	var kaz = [
		{"id":1, "a1":"3,2",	"a2":"0,5",	"a3":"5,4",	"a4":"5,4",	"a5":"5,4", "a6":'28,2'}
	];
	
	
	var cities = [
	{"id":1, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":2, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":3, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":4, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":5, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":6, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":7, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":8, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":9, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":10, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":11, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":12, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":13, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":14, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":15, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":16, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":17, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":18, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":19, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":20, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":21, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":22, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":23, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":24, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":25, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":26, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":27, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":28, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":29, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":30, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":31, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":32, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":33, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":34, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":35, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":36, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":37, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":38, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":39, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":40, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":41, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":42, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":43, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":44, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":45, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":46, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":47, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":48, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":49, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":50, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":51, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":52, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":53, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":54, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":55, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":56, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":57, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":58, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":59, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":60, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":61, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":62, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":63, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":64, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":65, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":66, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":67, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":68, "a1":"13,1",	"a2":"1,0",	"a3":"9,5",	"a4":"9,0",	"a5":"9,0"},
	{"id":69, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":70, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":71, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":72, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":73, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":74, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":75, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":76, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":77, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":78, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":79, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":80, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":81, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":82, "a1":"13,1",	"a2":"1,0",	"a3":"9,5",	"a4":"9,0",	"a5":"9,0"},
	{"id":83, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":84, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":85, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":86, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":87, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":88, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":89, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":90, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":91, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":92, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":93, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":94, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":95, "a1":"23,0",	"a2":"1,3",	"a3":"13,0",	"a4":"12,2",	"a5":"12,2"},
	{"id":96, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":97, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":98, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":99, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":100, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":101, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":102, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":103, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":104, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":105, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":106, "a1":"23,0",	"a2":"1,3",	"a3":"13,0",	"a4":"12,2",	"a5":"12,2"},
	{"id":107, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":108, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":109, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":110, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":111, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":112, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":113, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":114, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":115, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":116, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":117, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":118, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":119, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":120, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":121, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":122, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":123, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":124, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":125, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":126, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":127, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":128, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":129, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":130, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":131, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":132, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":133, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":134, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":135, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":136, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":137, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":138, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":139, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":140, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":141, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":142, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":143, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":144, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":145, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":146, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":147, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":148, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":149, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":150, "a1":"4,7",	"a2":"0,8",	"a3":"6,1",	"a4":"6,0",	"a5":"5,9"},
	{"id":151, "a1":"3,3",	"a2":"0,6",	"a3":"5,4",	"a4":"5,3",	"a5":"5,2"},
	{"id":152, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":153, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":154, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"},
	{"id":155, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":156, "a1":"6,4",	"a2":"0,8",	"a3":"6,3",	"a4":"6,2",	"a5":"6,0"},
	{"id":157, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":158, "a1":"3,6",	"a2":"0,7",	"a3":"5,7",	"a4":"5,6",	"a5":"5,5"},
	{"id":159, "a1":"3,4",	"a2":"0,7",	"a3":"5,6",	"a4":"5,5",	"a5":"5,4"},
	{"id":160, "a1":"23,0",	"a2":"1,3",	"a3":"13,0",	"a4":"12,2",	"a5":"12,2"},
	{"id":161, "a1":"13,1",	"a2":"1,0",	"a3":"9,5",	"a4":"9,0",	"a5":"9,0"},
	{"id":162, "a1":"3,3",	"a2":"0,7",	"a3":"5,5",	"a4":"5,4",	"a5":"5,3"}

	];

	
	weight.on('input', function(){
		var v = $(this).val();
		v.replace(/\./g,',');
		v = Number(v);
		var res;
		if ($('.adr').val() === 'kz' || $('.adr').val() === 'kg') {
			$('.rucities').slideUp();
					var curs = 1;			
					var a1 = Number(kaz[0].a1.replace(/,/g, "."));
					var a2 = Number(kaz[0].a2.replace(/,/g, "."));
					var a3 = Number(kaz[0].a3.replace(/,/g, "."));
					var a4 = Number(kaz[0].a4.replace(/,/g, "."));
					var a5 = Number(kaz[0].a5.replace(/,/g, "."));
					var five = 28.2;
					var fth = five + Math.ceil(15-5)*a3;
					var thee = fth + Math.ceil(30-15)*a4;
					
					if (v === 0.1) {
						res = a1  * curs;	
					} else if (v > 0.1 && v < 5) {
						res = (a1 + (v-0.1)/0.1*a2) * curs;
					}	else if (v == 5) {
						res = five * curs;
					} else if (v > 5 && v < 15.1) {
						res = (five + Math.ceil(v-5)*a3) * curs;
					} else if (v > 15 && v < 30.1) {
						res = (fth + Math.ceil(v-15)*a4) * curs;
					} else if (v > 30) {
						res = (thee + Math.ceil(v-30)*a5) * curs;
					} else {
						res = 0;
					}
					res = Math.ceil((res)*100)/100;
					$('#result1').html(calctext + ': <b>'+res+' $.</b>');
		} else if ($('.adr').val() === 'ru') {
			for (var i=0; i<cities.length; i++) {
				if (cities[i].id == $('.rucities').val()) {
					var curs = 1;			
					var a1 = Number(cities[i].a1.replace(/,/g, "."));
					var a2 = Number(cities[i].a2.replace(/,/g, "."));
					var a3 = Number(cities[i].a3.replace(/,/g, "."));
					var a4 = Number(cities[i].a4.replace(/,/g, "."));
					var a5 = Number(cities[i].a5.replace(/,/g, "."));
					var five = a1 + (5-0.1)/0.1*a2;
					var fth = five + Math.ceil(15-5)*a3;
					var thee = fth + Math.ceil(30-15)*a4;
					
					if (v === 0.1) {
						res = a1  * curs;	
					} else if (v > 0.1 && v < 5.1) {
						res = (a1 + (v-0.1)/0.1*a2) * curs;
					} else if (v > 5 && v < 15.1) {
						res = (five + Math.ceil(v-5)*a3) * curs;
					} else if (v > 15 && v < 30.1) {
						res = (fth + Math.ceil(v-15)*a4) * curs;
					} else if (v > 30) {
						res = (thee + Math.ceil(v-30)*a5) * curs;
					} else {
						res = 0;
					}
					res = Math.ceil((res)*100)/100;
					$('#result1').html(calctext + ': <b>'+res+' $.</b>');
					
				}
			}
		}
	});
	var orderJSON;

	$('.calc .container .flex form button').click(function(){
		var number = $('.mail-number').val();
		if (number != '') {
			number = number.replace('-','');
			if (number.length != 9) {
				sweetAlert("Ошибка", 'Номер должен состоять из 9 цифр', "error");
				return false;
			} else {
			 	
			 jQuery.ajax({
				url:     'order.php', //Адрес подгружаемой страницы
				type:     "POST", //Тип запроса
				dataType: "html", //Тип данных
				data: {"number": number},
				success: function(response) { //Если все нормально
					
					orderJSON = JSON.parse(response);
					orderJSON = orderJSON[0];
					//alert(orderJSON);
					if (!orderJSON.barcode) {
						sweetAlert("Ошибка", 'Такого номер не существует, пожалуйста проверьте данные или обратитесь в службу поддержки.', "error");
						return false;
					} else {
						//$('#client_post').html(orderJSON.client);
						//$('#from').html(orderJSON.from)
						//$('#to').html(orderJSON.to)
						//$('#client_get').html(orderJSON.client);
					
						$('#track_weight').html(orderJSON.weight);
						$('#barcode').html(orderJSON.barcode);
						$('#tracking').html('');
						//$('#status').html(orderJSON.status);
						
						/*
						var dateIn = new Date(Number(orderJSON.dateBegin)), 
							dayIn = dateIn.getDate(),
							monthIn = dateIn.getMonth(),
							hourIn = dateIn.getHours(),
							minIn = dateIn.getMinutes(),
							secIn = dateIn.getSeconds();
						
						if (orderJSON.dateEnd != '' && orderJSON.dateEnd != '0') {
						var dateOut = new Date(Number(orderJSON.dateEnd)),
						    dayOut = dateOut.getDate(),
						    monthOut = dateOut.getMonth(),
						    hourOut = dateOut.getHours(),
						    minOut = dateOut.getMinutes(),
						    secOut = dateOut.getSeconds();
							
							if (dayOut < 10) { dayOut = '0'+dayOut; }
							if (monthOut < 10) { monthOut = '0'+monthOut; }
							if (hourOut < 10) {	hourOut = '0'+hourOut;	}
							if (minOut < 10) {	minOut = '0'+minOut;	}
							if (secOut < 10) {	secOut = '0'+secOut;	}
							
						} else {
							var dateOut = '';
						}
						if (dayIn < 10) { dayIn = '0'+dayIn; }
						if (monthIn < 10) {	monthIn = '0'+monthIn;	}
						if (hourIn < 10) {	hourIn = '0'+hourIn;	}
						if (minIn < 10) {	minIn = '0'+minIn;	}
						if (secIn < 10) {	secIn = '0'+secIn;	}
						
					
						
						
						$('#tracking').append('<div class="item"><div class="time">'+hourIn +':'+minIn+':'+secIn+' '+dayIn+'.'+monthIn+'.'+dateIn.getFullYear()+'</div><div class="local">Регистрация в системе</div></div>');	
						for (var i = 0; i<orderJSON.status.length; i++) {
							$('#tracking').append('<div class="item"><div class="local">'+ orderJSON.status[i] + '</div></div>');[i]
						}*/
						for (var i=0; i<orderJSON.status.length; i++) {
							var item = orderJSON.status[i];
							var date = new Date(Number(item[1]));
						
							
							// Вычислим значение смещения текущего часового пояса в часах
							var currentTimeZoneOffsetInHours = -date.getTimezoneOffset()/60;
							
							//отнимаем часы от даты
							date.setHours(date.getHours() - currentTimeZoneOffsetInHours);
							

							var year = date.getFullYear(),
								mon = date.getMonth()+1,
								hour = date.getHours(),
								min = date.getMinutes(),
								sec = date.getSeconds(),
								day = date.getDate();
								
							
							if (hour < 10) { hour = '0'+hour; }
							if (min < 10) {	min = '0'+min;	}
							if (sec < 10) {	sec = '0'+sec;	}
							if (mon < 10) {	mon = '0'+mon; }
							if (day < 10) {	day = '0'+day;	}
							
							var time = hour +':'+min+':'+ sec;
							
							$('#tracking').append('<div class="item"><div class="time">'+time+' '+day+'.'+mon+'.'+year+'</div><div class="local">'+item[0]+'</div></div>');
						}
						/*if (dateOut != '') {
							$('#tracking').append('<div class="item"><div class="local">Прибыло по месту назначения</div></div>');
						} 
						<div class="time">'+hourOut +':'+minOut+':'+secOut+' '+dayOut+'.'+monthOut+'.'+dateOut.getFullYear()+'</div> подсчет времени прибытия*/
						  $.fancybox( "#orderModal", {
								padding: 0,
								autoResize : true,
								fitToView : false,
								maxWidth: "100%"
							} );
					}
					
				},
				error: function(response) { //Если ошибка
					sweetAlert("Ошибка", 'Возникли какие-то проблемы, приносим свои извинения. Для получения подробной информации обратитесь в службу поддержки.', "error");
				}
			});
			}
		}
	});
	
    $('form[method=POST]').submit(function() {
        return false;
    });
    $('form[method=GET]').submit(function() {
		var form = $(this);
		AjaxFormRequest(form, form, 'client.php');
        return false;
    });

    $('.footer-form').click(function(){
        var form = $(this).parent();
        var tel_this = $(this).parent().find('.tel').val();
        if($.trim(tel_this) == '' || $.trim(tel_this) == phone){
            sweetAlert("Ошибка", ent_tel, "error");
            return false;
        }
        AjaxFormRequest(form, form, 'action.php');
    });
	
	 $('.form-quest').click(function(){
        var form = $(this).parent();
        var email_this = $(this).parent().find('.email').val();
        var text_this = $(this).parent().find('.quest-text').val();
        if($.trim(email_this) == '' || $.trim(email_this) == email){
            sweetAlert("Ошибка", ent_email, "error");
            return false;
        } else if (!isValidEmailAddress(email_this)) {
			sweetAlert("Ошибка", ent_email_c, "error");
            return false;
		}
		 if($.trim(text_this) == '' || $.trim(text_this) == qq){
            sweetAlert("Ошибка", ent_qq, "error");
            return false;
        }
        AjaxFormRequest(form, form, 'action.php');
    });
	
	 $('.form-mail').click(function(){
        var form = $(this).parent();
        var tel_this = $(this).parent().find('.tel').val();
        var email_this = $(this).parent().find('.email').val();
        if($.trim(tel_this) == '' || $.trim(tel_this) == phone){
            sweetAlert("Ошибка", ent_tel, "error");
            return false;
        }
		 if($.trim(email_this) == '' || $.trim(email_this) == email){
            sweetAlert("Ошибка", ent_email, "error");
            return false;
        } else if (!isValidEmailAddress(email_this)) {
			sweetAlert("Ошибка", ent_email_c, "error");
            return false;
		}
        AjaxFormRequest(form, form, 'action.php');
    });


    jQuery(document).ajaxStart(function(){
        $('.loading').show();
    });
    jQuery(document).ajaxStop(function(){
        $('.loading').hide();
    });
	
	for (var l=0; l<cities.length; l++) {
		var city;
		$('.rucities option').each(function(){
			if (cities[l].id == $(this).val()) {
				city = $(this).text();
			}
		});
		var a2 = Number(cities[l].a2.replace(/,/g, "."));
		var kg = Number(cities[l].a1.replace(/,/g, ".")) + a2 * 9;
		var kg = Math.ceil((kg)*100)/100;
		$('.modal-ru-generated tbody').append('<tr><td>'+city+'</td><td>'+cities[l].a1+'</td><td>'+cities[l].a2+'</td><td>'+kg+'</td><td>'+cities[l].a3+'</td><td>'+cities[l].a4+'</td><td>'+cities[l].a5+'</td></tr>')
	}
	
	for (var q=0; q<kaz.length; q++) {
		var a2 = Number(kaz[q].a2.replace(/,/g, "."));
		var kg = Number(kaz[q].a1.replace(/,/g, ".")) + a2 * 9;
		var kg = Math.ceil((kg)*100)/100;
		$('.modal-kz-generated tbody').append('<tr><td>'+kaz[q].a1+'</td><td>'+kaz[q].a2+'</td><td>'+kg+'</td><td>'+kaz[q].a6+'</td><td>'+kaz[q].a3+'</td></tr>')
	}
	
});
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
function AjaxFormRequest(result_id,form_id,url) {
    jQuery.ajax({
        url:     url, //Адрес подгружаемой страницы
        type:     "POST", //Тип запроса
        dataType: "html", //Тип данных
        data: jQuery(form_id).serialize(),
        success: function(response) { //Если все нормально
            $(result_id).html(response);
            yaCounter49373905.reachGoal('zayavka'); return true;
        },
        error: function(response) { //Если ошибка
            $(result_id).html(response);
        }
    });
}

$('.modal.client .block .flex .right .val .v').click(function(){
	$('.modal.client .block .flex .right .val .v').removeClass('active');
	$(this).addClass('active');
	var text = $(this).text();
	$('#input-money').val(text);
});
