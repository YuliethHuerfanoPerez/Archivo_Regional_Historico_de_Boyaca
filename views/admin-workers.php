<?php

require 'database.php';
    session_start();

    

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id, usuario, password FROM users WHERE id = :id ');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>admin</title>
    <!-- =============== Bootstrap Core CSS =============== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!-- =============== fonts awesome =============== -->
    <link rel="stylesheet" href="assets/font/css/font-awesome.min.css" type="text/css">
    <!-- =============== Plugin CSS =============== -->
    <link rel="stylesheet" href="assets/css/animate.min.css" type="text/css">
    <!-- =============== Custom CSS =============== -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- =============== Owl Carousel Assets =============== -->
    <link href="assets/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/owl-carousel/owl.theme.css" rel="stylesheet">
	
	<link rel="stylesheet" href="assets/css/isotope-docs.css" media="screen">
	<link rel="stylesheet" href="assets/css/baguetteBox.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body>
    <!-- si esta registrado el usuario, muestra esto -->
  <?php if(!empty($user)):?>
    <!-- =============== Preloader =============== -->
    <div id="preloader">
        <div id="loading">
		<img width="256" height="32" src="assets/img/loading-cylon-red.svg">	
        </div>
    </div>
    <!-- =============== nav =============== -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top" >
        <div class="container" >
            <div class="container-fluid" style="background-color: #1EA078;"> 
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="assets/img/logo.png" alt="Logo" width="45%">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a class="page-scroll" href="admin-news.php">Noticias</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="admin-documents.php">Documentos</a>
                        </li>
                        <li>
							<a class="page-scroll" href="admin-investigator.php">Investigadores</a>
                        </li>
                        <li class="active">
                            <a class="page-scroll" href="admin-workers.php">Personal</a>
                        </li>
                        <li>
                            Bienvenido <?= $user['usuario'] ?>
                            <a href="logout.php" class="page-scroll">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
                <!-- =============== navbar-collapse =============== -->

            </div>
        </div>
        <!-- =============== container-fluid =============== -->
    </nav>
    <BR></BR>
    <BR></BR>
    <BR></BR>
    <BR></BR>
    <Section id="workers-pri">
        <div class="container">            
			<div class="row">
				
				    <div class="col-sm-6 izq wow fadeInDown animated" data-wow-delay=".1s">
                        <div class="titleadmin"> 
                            <div class="row">
                                <div class="col-xs-10 form-group wow fadeInUp animated">
                                    <h2>FUNCIONARIOS</h2>
                                </div>
                                <div class="col-xs-2 form-group wow fadeInUp animated">
                                    <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit"onclick="window.location.href='admin-workers.html'"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                           
                            
                        </div>
                        <div>
                            <form action="#" method="post">
                                <div class="ajax-hidden">
                                    <div class="col-xs-8 form-group wow fadeInUp animated">
                                        <label for="c_name" class="sr-only">Nombre</label>
                                        <input type="text" placeholder="Nombre" name="name" class="form-control" id="name" required="">
                                    </div>
                                    <div class="col-xs-4 form-group wow fadeInUp animated">
                                        <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="ajax-response"></div>
                            </form>
                        </div>
                        <div class="col-sm-12 izq wow fadeInDown animated" data-wow-delay=".1s">
                            <form action="#" method="post">
                                <br>
                                <div class="ajax-hidden">
                                    <div class="col-xs-12 form-group wow fadeInUp animated">
                                        <label >Funcionario 1</label> 
                                    </div>
                                    <div class="col-xs-4 form-group wow fadeInUp animated">
                                        <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="col-xs-4 form-group wow fadeInUp animated">
                                        <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                                <div class="ajax-response"></div>
                            </form>
                        </div>
                        <div class="col-sm-12 izq wow fadeInDown animated" data-wow-delay=".1s">
                            <form action="#" method="post">
                                <br>
                                <div class="ajax-hidden">
                                    <div class="col-xs-12 form-group wow fadeInUp animated">
                                        <label >Funcionario 1</label> 
                                    </div>
                                    <div class="col-xs-4 form-group wow fadeInUp animated">
                                        <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="col-xs-4 form-group wow fadeInUp animated">
                                        <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                                <div class="ajax-response"></div>
                            </form>
                        </div>
                        <div class="col-sm-12 izq wow fadeInDown animated" data-wow-delay=".1s">
                            <form action="#" method="post">
                                <br>
                                <div class="ajax-hidden">
                                    <div class="col-xs-12 form-group wow fadeInUp animated">
                                        <label >Funcionario 1</label> 
                                    </div>
                                    <div class="col-xs-4 form-group wow fadeInUp animated">
                                        <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="col-xs-4 form-group wow fadeInUp animated">
                                        <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                                <div class="ajax-response"></div>
                            </form>
                        </div>
                      
				    </div>
				    <div class="col-sm-6 wow fadeInUp animated" data-wow-delay=".2s">
                        <div class="titleadmin"> 
                            <h2>GESTIONAR</h2>
                        </div>
                        <div class="col-xs-12 wow bounceIn animated" data-wow-delay=".1s">
                            <form action="#" method="post">
                                <div class="ajax-hidden">
                                    <div class="col-xs-12 form-group wow fadeInUp animated">
                                        <label for="c_name" class="sr-only">Codig</label>
                                        <input type="text" placeholder="Codigo" name="name" class="form-control" id="name" required="">
                                    </div>
            
                                    <div data-wow-delay=".1s" class="col-xs-12 form-group wow fadeInUp animated">
                                        <label for="c_email" class="sr-only">Nombre</label>
                                        <input type="text" placeholder="Nombre" name="email" class="form-control" id="email"  required="">
                                    </div>
                                    <div class="col-xs-12 form-group wow fadeInUp animated">
                                        <label for="c_name" class="sr-only">Cedula</label>
                                        <input type="number" placeholder="Cedula" name="name" class="form-control" id="name" required="">
                                    </div>
                                    <div class="col-xs-12 form-group wow fadeInUp animated">
                                        
                                        <select name="" id="">
                                            <option value="">Cargo</option>
                                            <option value="">Administrador</option>
                                            <option value="">Funcionario</option>
                                        </select>
                                    </div>
                                    <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit" style="background-color: #1EA078; color: white;">Añadir</button>
                                </div>
                                <div class="ajax-response"></div>
                            </form>
                        </div>				   
				     </div>
				                  
				
			</div>
		</div>
    </Section>

        


	   
	<!-- =============== jQuery =============== -->
    <script src="assets/js/jquery.js"></script>
	 <script src="assets/js/isotope-docs.min.js"></script>
    <!-- =============== Bootstrap Core JavaScript =============== -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- =============== Plugin JavaScript =============== -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.fittext.js"></script>
    <script src="assets/js/wow.min.js"></script> 
	<!-- =============== owl carousel =============== -->
    <script src="assets/owl-carousel/owl.carousel.js"></script>  
	<!-- Isotope does NOT require jQuery. But it does make things easier -->

<script src="assets/js/baguetteBox.js" async></script>
<script src="assets/js/plugins.js" async></script>
 
    <!-- =============== Custom Theme JavaScript =============== -->
    <script src="assets/js/creative.js">	</script> 
<script src="assets/js/jquery.nicescroll.min.js"></script>

<script>
  $(document).ready(function() {
  
	var nice = $("html").niceScroll();  // The document page (body)
	
	$("#div1").html($("#div1").html()+' '+nice.version);
    
    $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#00F",boxzoom:true}); // First scrollable DIV

    $("#boxscroll2").niceScroll("#contentscroll2",{cursorcolor:"#F00",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true});  // Second scrollable DIV
    $("#boxframe").niceScroll("#boxscroll3",{cursorcolor:"#0F0",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true});  // This is an IFrame (iPad compatible)
	
    $("#boxscroll4").niceScroll("#boxscroll4 .wrapper",{boxzoom:true});  // hw acceleration enabled when using wrapper
    
  });
</script>
<script>
window.onload = function() {
    if(typeof oldIE === 'undefined' && Object.keys)
        hljs.initHighlighting();

    baguetteBox.run('.baguetteBoxOne');
    baguetteBox.run('.baguetteBoxTwo');
    baguetteBox.run('.baguetteBoxThree', {
        animation: 'fadeIn'
    });
    baguetteBox.run('.baguetteBoxFour', {
        buttons: false
    });
    baguetteBox.run('.baguetteBoxFive', {
        captions: function(element) {
            return element.getElementsByTagName('img')[0].alt;
        }
    });
};
</script>
<!-- si no esta registrado el usuario muestra esto -->
<?php else: ?>
  <?php 
      require 'index.html';
      ?>
    <?php endif; ?>
</body>
</html>