<?php include "functions.php"; 
include_once 'inc/class.crud.php'; ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>xlsxdbcrud Data</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/xlsxdbcrud.css">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/app.js"></script>
	</head>
	<body ng-app="app">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><span class='white'>xlsxdbcrud</span><span class='red'>Data</span></a>
        </div>
      </div>
    </nav>

    <div class="jumbotron">
      <div class="container">
			<div class="row">
				<div class="col-xs-4 whiterightbrdr"><h3><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Backend</h3>
        <p><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;MySql</p>
		<p><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;PHP</p>
		<p><a class="btn btn-primary behlp" href="#" role="button">More &raquo;</a></p></div>
				
				<div class="col-xs-4 whiterightbrdr"><h3><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Frontend</h3>
		<p><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;HTML5, Bootstrap & CSS</p>
		<p><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Angular & jQuery</p>
		<p><a class="btn btn-primary fehlp" href="#" role="button">More &raquo;</a></p></div>
				
				<div class="col-xs-4"><h3><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;A bit more info...</h3>
		<p><span class="glyphicon glyphicon-pushpin"></span>&nbsp;&nbsp;This is an example CRUD app...</p>
		<p>&nbsp;&nbsp;</p>
		<a class="btn btn-primary moreinfo" href="#" role="button">More &raquo;</a></div>
			</div>
		
		<div id="behlpPane">
		<h2>The back-end</h2>
		<p>The backend technologies used in putting this site together include a MySql database, created via PHPMyAdmin, and PHP to communicate with it.</p>
		<p>A single table, with 5 columns holds the data imported from the "test_data.xlsx" file via the PHPExcel plugin.</p>
		<p>To ensure the data is only loaded into the database once, the file is suffixed with "<i>backup</i>" after the import and is left in the folder for reference.</p>
		<p>PHP sessions are used as a navigational aid, and ajax calls to pages and/or functions carry out the interactions with the database.</p>
		<p><a class='btn btn-success closebtn' href='#'>Close</a></p></div>
		
		<div id="fehlpPane">
		<h2>The front-end</h2>
		<p>The front-end technologies running this site are HTML5, Bootstrap, Angular, jQuery and CSS.</p>
		<p>The site is built with a responsive layout that adapts to the visitor's screen resolution.</p>
			<p><a class='btn btn-success closebtn' href='#'>Close</a></p></div>
		
		<div id="moreinfoPane">
		<h2>A bit of background to the project...</h2>
			<p>I had a regular need for a fully-functioning CRUD that I could just copy & paste from as and when the need arose. So, this is that project.</p>
			<p><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;It scans a folder for newly added files, appending any new data to the database and renaming and archiving the newly added file.</p>
			<p><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;There is a lot more to be done, e.g. a graphing function to display real time information as data is added to the database from newly uploaded files; a login function to allow access to a file upload function which will save files to a given folder, import their contents into the database and rename them for archiving. The new data is plotted in real-time by JSON-encoding a PHP array, then decoding it back into a Javascript array for output via jqPlot.</p>
			<p><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Also to be done is form input validation - just to gather the various methods for securing contact into a single (set of) file(s), from input-typing and CAPTCHA to email verification.</p>
			<p><a class='btn btn-success closebtn' href='#'>Close</a></p></div>
	  
      </div>
    </div>
	
	<div class="container maincontainer">
		<h1>Product Catalogue</h1>
		<div class="margTop20 prodPane">
		</div><a class='btn btn-success backbtn' href='#'>Close</a>
	</div>
		
	<div class="container subcontainer margTop20">
	<a class='btn btn-primary addprodlnk' href='#'>Add a new product</a><a class='btn btn-primary showdbinfo' href='#'>DB / Conn info</a>
	
		<div id='addProdDiv'>
		<h3>Add a new product</h3>
		<form name="addprodForm" class="form">
			<div class="form-group">
				<label>Category:</label><input type="text" class="form-control" id="addProdCatip" placeholder="Category" value="" required />
			</div>
			<div class="form-group">
				<label>Sub-Category:</label><input type="text" class="form-control" id="addProdSubip" placeholder="Subcategory" value="" required />
			</div>
			<div class="form-group">
				<label>Product Number:</label><input type="text" class="form-control" id="addProdPartnoip" placeholder="Part No." value="" required />
			</div>
			<div class="form-group">
				<label>Description:</label><input type="text" class="form-control" id="addProdDescip" placeholder="Description" value="" required />
			</div>
			<div class="row">
				<div class="col-xs-12">
					<button class="btn btn-success pull-right" id="addProdBtn"><span class="glyphicon glyphicon-plus-sign"></span> Add</button><a class='btn btn-primary cancaddprodbtn' href='#'>Cancel</a>
				</div>
			</div>
		</form>
		</div>
		
		<div id='dbInfoDiv'> <?php getDBinfo(); ?> </div>
		
	</div>
		
<div id='footer'><p>&copy;<?php echo date("Y") ?>&nbsp;<a href="http://www.siteworx.ie/">Siteworx.ie</a></p></div>

		<script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>