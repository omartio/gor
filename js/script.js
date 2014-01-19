$(document).ready(function(){
	VK.init(function() 
	{
		$('.progress-bar').animate({width : '100%'}, 200);
		
		VK.api('users.get', {uids: GetQueryStringParams('viewer_id'), fields: "bdate"}, function (user)
		{	
			user = user.response[0]; // Данные о пользователе
			
			$('#date').html(getDate()); // Сегоднящняя дата
			
			signin(user);
			
			$('#subs').popover({content: "Нажмите чтобы оформить подписку", placement: 'bottom', trigger: 'hover'});
			
			VK.addCallback("onOrderSuccess", function(order_id){
				signin(user);
				$('#myModal').modal('hide');
				$('#modal-succes').modal();
			});
			
		});	
	},
	function() { // авторизоваться через ВК не получилось
		alert("Произошла ошибка. Перезагрузите страницу.");
	}, '5.5'); 

});

function newOrder()
{
	var params = { 
	    type: 'item', 
	    item: $('input.subs-len:checked').val() 
	}; 
	VK.callMethod('showOrderBox', params); 
}

// Проверяем есть ли юзер в базе и его подписку
function signin(user)
{
	
	$.get('signin.php', {uid : user.id}).done(
		function (info)
		{
			var singin_data = jQuery.parseJSON(info);
			if (singin_data.prem >0)
			{
				$('.alert').addClass('hide');
				var days;
				if (singin_data.prem == 1) days = ' день'; else if (singin_data.prem < 5) days = ' дня'; else days = ' дней';
				$('#subs').html('Подписка еще '+ singin_data.prem + days);
			}
			else
			{
				$('#subs').html('Оформить подписку');
				
			}
			var znakN = singin_data.znak;
			console.log(user);
			if (znakN < 0)
			{
				if (user.bdate != undefined)
					change_znak(getZnakNByBd(user.bdate)); // Номер его знака
				else
					change_znak_modal();
					
			} else {
				loadZnak(znakN);
			}
		}
	);
}

function loadZnak(znakN){
	$('#znak').html(getZnak(znakN)); // Определяем его знак
			
			$('#znak-img').attr('src', 'img/znaki/' + znakN + '.jpg'); // Ставим картинку нужного знака
			
			// Проверяем есть ли юзер в базе и его подписку
			
			
			$('#today').load("get_gor.php?znak="+znakN, function(){$('.progress').fadeOut(100, function(){$('.container').fadeIn(300)});}); // Загрузка гороскопа на сегодня
			
			// загружаем друзей такого же знака
			
			VK.api('friends.get', {order: "hints", fields: "bdate, photo_100"}, function (data) {
				
				sameFriends(data, znakN);
			});

}

function getSubs()
{
	$('#myModal').modal();
}

// Друзья такого же знака
function sameFriends(data, znakN)
{
$("#frineds-list").html("");
	var c = 0;
	var n = data.response.count;
	for (var i = 0; i < n; i++)
	{
		if (data.response.items[i].bdate!=undefined && znakN == getZnakNByBd(data.response.items[i].bdate))
		{
			$("#frineds-list").append("<a href='http://vk.com/id" + data.response.items[i].id + "' target='_blank'> <img src='" + data.response.items[i].photo_100 + "' class='img-thumbnail friend' \></a>");
			if (++c == 6)
				break;
			
		}
	}
}

function getDate()
{
	var today = new Date();
	var months = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
	return today.getDate() + " " + months[today.getMonth()];
}

// Получаем знак по дате рождения
var znaliS= ['Водолей', 'Рыбы', 'Овен', 'Телец', 'Близнецы', 'Рак', 'Лев', 'Дева', 'Весы', 'Скорпион', 'Стрелец', 'Козерог'];
function getZnak(n)
{	
	return znaliS[n];
	
}
// Получаем номер знака по д/р
function getZnakNByBd(bd)
{
	var dateS = bd.split('.');
	
	var day = parseInt(dateS[0]);
	var month = parseInt(dateS[1])-1;
	
	var znaki = [20, 19, 21, 20, 21, 21, 23, 23, 23, 23, 22, 22];
	var i = month + (day >= znaki[month] ? 0 : (-1));
	if (i<0) i = 11;
	return i;	
}

function change_znak_modal()
{
	$("#chZnak").html("");
	for (var i=0; i<12;i++){
		$("#chZnak").append("<div class='col-sm-3'>" + znaliS[i] + "<a href='#' onclick='change_znak(" + i + ")' class='thumbnail'><img  src='img/znaki/" + i + ".jpg' \></a>  </div>");
	}
	$("#change-znak").modal();
}

function change_znak(znak){
	loadZnak(znak);
	$.get('change_znak.php?znak=' + znak);
	$("#change-znak").modal("hide");
}

function GetQueryStringParams(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}