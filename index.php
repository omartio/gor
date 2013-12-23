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
    
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	    <div class="collapse navbar-collapse">
	    	<ul class="nav navbar-nav">
	    		<li><a href="#">Личный гороскоп</a></li>
				<li><a href="#">Новости <span class="badge">1</span></a></li>
	    	</ul>
	    
			<p class="navbar-text pull-right" id='subs'>Подписка не куплена</p>
	    </div>
    </nav>
    
    <div class="container">
	    <div class="row">
	    	<div class="col-sm-12">
		    	<div class="alert alert-info alert-dismissable">
				  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  	<strong>Личный гороскоп!</strong> Узнай что звезды говорят именно о тебе! <a href="#" class="alert-link">Подробнее</a>
				</div>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-3">
		    	<div class="thumbnail">
		    	<h3 id='znak'>Телец</h3>
			      <img src="img/znaki/2.jpg">
			      <div class="caption">
			      <button type="button" class="btn btn-default btn-xs btn-block">Изменить</button>
			      </div>
			    </div>
	    	</div>
	    	<div class="col-sm-9">
	    		<ul class="nav nav-pills">
					<li class="active"><a href="#today" data-toggle="tab">Сегодня</a></li>
					<li><a href="#week" data-toggle="tab">Неделя</a></li>
					<li><a href="#month" data-toggle="tab">Месяц</a></li>
	    		</ul>
	    		<div class="tab-content">
					<div class="tab-pane active" id="today">Гороскоп на сегодня</div>
					<div class="tab-pane" id="week">Гороскоп на неделю</div>
					<div class="tab-pane" id="month">Гороскоп на месяц</div>
	    		</div>
	    	</div>
	    </div>
    </div>
    
  </body>
</html>