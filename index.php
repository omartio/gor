<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//vk.com/js/api/xd_connection.js?2"  type="text/javascript"></script>
    <script src="js/script.js"></script>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
	    <div class="collapse navbar-collapse">
	    	<ul class="nav navbar-nav">
	    		<li><a href="#" class="lead">Сегодня <span id='date'> </span> </a></li>
				<li><a href="#" class="lead">Новости <span class="badge">1</span></a></li>
				
	    	</ul>
	    	
	    	<ul class="nav navbar-nav pull-right">
	    		<li><a href="#" onclick="getSubs()" class="lead strong" id='subs'> <img src="img/loader.gif"> </a></li>
	    	</ul>
	    
			
	    </div>
    </nav>
    
    <div class="progress progress-striped">
	  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">				   
	  </div>
	</div>
    
    <div class="container" style="display: none;">
	    <div class="row">
	    	<div class="col-sm-12">
		    	<div class="alert alert-info alert-dismissable fade in">
				  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  	<strong>Личный гороскоп!</strong> Узнай что звезды говорят именно о тебе! <a href="#" onclick="getSubs()" class="alert-link">Подробнее</a>
				</div>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-3">
		    	<div class="thumbnail">
		    	<h3 id='znak'></h3>
			      <img id='znak-img' src="#">
			      <div class="caption">
			      <button type="button" onclick="change_znak_modal()" class="btn btn-default btn-xs btn-block">Изменить</button>
			      </div>
			    </div> 
	    	</div>
	    	<div class="col-sm-9">
	    	  <div class="well">
	    		<ul class="nav nav-pills">
					<li class="active"><a href="#today" data-toggle="tab">Сегодня</a></li>
					<li><a href="#week" data-toggle="tab">Неделя</a></li>
					<li><a href="#pers" data-toggle="tab">Личный</a></li>
	    		</ul>
	    		<div class="tab-content">
					<div class="tab-pane active" id="today">
						
					</div>
					<div class="tab-pane" id="week">Гороскоп на неделю</div>
					<div class="tab-pane" id="pers">Личный гороскоп</div>
	    		</div>
	    	  </div>
	    	</div>
	    </div>
	    
	    <div class="row friends">
	    	<div class="col-sm-12">
	    		<p class="lead">Друзья такого же знака</p><br>
	    		<div id='frineds-list'>
	    		</div>
	    	</div>
	    </div>
    </div>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Личный гороскоп</h4>
	      </div>
	      <div class="modal-body">
	        <p>Приобретая подписку, вы будете получать <strong>гороскоп лично составленный для вас нашими астрологами</strong>. <br> 
		        Подписка на:
	        </p>
	        <table>
	        	<tr> <td> <label> <input type="radio" name="optionsRadios" class="subs-len" id="optionsRadios1" value="item1" checked> 1 день </label> </td> <td> <p class="text-muted small">(1 голос)</p> </td></tr>
	        	<tr> <td> <label> <input type="radio" name="optionsRadios" class="subs-len" id="optionsRadios2" value="item2" > 3 дня </label> </td> <td> <p class="text-muted small">(2 голоса)</p> </td></tr>
	        	<tr> <td> <label> <input type="radio" name="optionsRadios" class="subs-len" id="optionsRadios3" value="item3" > 7 дней </label> </td> <td> <p class="text-muted small">(5 голосов)</p> </td></tr>
	        </table>
	        
	      </div>
	      <div class="modal-footer">
	        
	        <button type="button" onclick="newOrder()" class="btn btn-primary">Оформить</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade" id="modal-succes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Поздравляем!</h4>
	    </div>
	    <div class="modal-body">
	        <p>Подписка оформлена, <strong>личный гороскоп</strong> будет составлен <strong> в течение часа </strong> и приблизительно в одно и то же время в следующие дни подписки. <br><br> <strong> Не забывайте продлевать подписку</strong></p>	        
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

    <div class="modal fade" id="change-znak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Ваш знак зодиака</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="row" id='chZnak'>
	      	
	      	</div>
	      </div>
	      
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

    
    
  </body>
</html>

<script>

</script>