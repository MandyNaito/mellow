<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="" name="keywords">
		<meta content="" name="description">

		<meta property="og:title" content="">
		<meta property="og:image" content="">
		<meta property="og:url" content="">
		<meta property="og:site_name" content="">
		<meta property="og:description" content="">

		<title><?=$wintitle?></title>
		<script>
			<?php
			
				foreach($this->lang->all() as $index => $value)
					echo " var {$index} = '{$value}'; \n";
			?>

			var base_url = '<?=base_url();?>';
		</script>
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
		
		<?=link_tag('assets/plugins/bootstrap/css/bootstrap.css')."\n";?>
		<?=link_tag('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')."\n";?>
		<?=link_tag('assets/plugins/node-waves/waves.css')."\n";?>
		<?=link_tag('assets/plugins/font-awesome/css/font-awesome.css')."\n";?>
		<?=link_tag('assets/plugins/animate-css/animate.css')."\n";?>
		<?=link_tag('assets/css/style.css')."\n";?>
		<?=link_tag('assets/css/portal.css')."\n";?>

		
		<?=script_tag('assets/plugins/jquery/jquery.min.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap/js/bootstrap.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-notify/bootstrap-notify.js')."\n";?>
		<?=script_tag('assets/plugins/node-waves/waves.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-mask/jquery.mask.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-maskmoney/jquery.maskMoney.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-validation/jquery.validate.js')."\n";?>
		<?=script_tag('assets/plugins/superfish/hoverIntent.js')."\n";?>
		<?=script_tag('assets/plugins/superfish/superfish.min.js')."\n";?>
		<?=script_tag('assets/plugins/morphext/morphext.min.js')."\n";?>
		<?=script_tag('assets/plugins/wow/wow.min.js')."\n";?>
		<?=script_tag('assets/plugins/stickyjs/sticky.js')."\n";?>
		<?=script_tag('assets/plugins/easing/easing.js')."\n";?>
		<?=script_tag('assets/plugins/momentjs/moment.js')."\n";?>
		<?=script_tag('assets/plugins/momentjs/locale/pt-br.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')."\n";?>
		<?=script_tag('assets/js/main.js')."\n";?>
		<?=script_tag('assets/js/portal.js')."\n";?>
				
		<?=link_tag('assets/images/favicon/apple-icon-57x57.png',   'apple-touch-icon', 'image/png', '', '', '57x57');?>
		<?=link_tag('assets/images/favicon/apple-icon-60x60.png',   'apple-touch-icon', 'image/png', '', '', '60x60');?>
		<?=link_tag('assets/images/favicon/apple-icon-72x72.png',   'apple-touch-icon', 'image/png', '', '', '72x72');?>
		<?=link_tag('assets/images/favicon/apple-icon-76x76.png',   'apple-touch-icon', 'image/png', '', '', '76x76');?>
		<?=link_tag('assets/images/favicon/apple-icon-114x114.png', 'apple-touch-icon', 'image/png', '', '', '114x114');?>
		<?=link_tag('assets/images/favicon/apple-icon-120x120.png', 'apple-touch-icon', 'image/png', '', '', '120x120');?>
		<?=link_tag('assets/images/favicon/apple-icon-144x144.png', 'apple-touch-icon', 'image/png', '', '', '144x144');?>
		<?=link_tag('assets/images/favicon/apple-icon-152x152.png', 'apple-touch-icon', 'image/png', '', '', '152x152');?>
		<?=link_tag('assets/images/favicon/apple-icon-180x180.png', 'apple-touch-icon', 'image/png', '', '', '180x180');?>
		<?=link_tag('assets/images/favicon/android-icon-192x192.png', 'icon', 'image/png', '', '', '192x192');?>
		<?=link_tag('assets/images/favicon/android-icon-32x32.png', 'icon', 'image/png', '', '', '32x32');?>
		<?=link_tag('assets/images/favicon/android-icon-96x96.png', 'icon', 'image/png', '', '', '96x96');?>
		<?=link_tag('assets/images/favicon/android-icon-16x16.png', 'icon', 'image/png', '', '', '16x16');?>
		<?=link_tag('assets/images/favicon/manifest.json', 'manifest', '');?>
		<!--
		<meta name="msapplication-TileColor" content="#ffffff">
		<?=meta('msapplication-TileImage', 'assets/images/favicon/ms-icon-144x144.png', 'image/png');?>
		<meta name="theme-color" content="#ffffff">
		
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>-->		
	</head>

	<body>
	  <div id="preloader"></div>

	  <section id="hero">
		<div class="hero-container">
		  <div class="wow fadeIn">
			<div class="hero-logo">
			  <?=img('assets/images/logo/lg-branca.png')."\n";?>
			</div>

			<h1>Bem-vindo ao Mellow Suite!</h1>
			<h2>Deixando a vida mais <span class="rotating col-cyan">doce, fácil, rápida, descomplicada</span></h2>
			<div class="actions">
			  <a href="#about" class="btn-orange-o">O projeto</a>
			  <a href="#portfolio" class="btn-pink">Acessar</a>
			</div>
		  </div>
		</div>
	  </section>

		<header id="header">
			<div class="container">
			<div id="logo" class="pull-left">
				<a href="#hero">
					<?=img('assets/images/logo/lg-branca.png')."\n";?>
				</a>
			</div>

			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="menu-active"><a href="#hero">Home</a></li>
					<li><a href="#about">O projeto</a></li>
					<li><a href="#services">Diferenciais</a></li>
					<li><a href="#portfolio">Mellow Suite</a></li>
					<li><a href="#team">A equipe</a></li>
				</ul>
			</nav>
			</div>
		</header>

		<section id="about">
			<div class="container wow fadeInUp">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title">O projeto</h3>
						<div class="section-title-divider"></div>
						<p class="section-description">Trabalho de conclusão de curso do curso de Tecnologia em Análise e Desenvolvimento de Sistemas, Setor de Educação Profissional e Tecnológica da Universidade Federal do Paraná.</p>
					</div>
				</div>
			</div>
			<div class="container about-container wow fadeInUp">
				<div class="row">
					<div class="col-md-6 col-md-push-6 about-content">
						<h2 class="about-title">Resumo</h2>
						<p class="about-text">
						Este trabalho visa documentar e descrever o desenvolvimento de um sistema que facilite o gerenciamento de entradas e saídas de clientes em estabelecimentos comerciais através da criação e automatização de comandas de usuários pre cadastrados. Além disso, permite também que os clientes possam acompanhar em tempo real a quantidade consumida até o momento e verificar as opções disponibilizadas no cardápio do estabelecimento através do acesso via smartphone conectado á internet. Ao analisar esse campo, verifica-se uma demora excessiva para realizar estas ações, prejudicanto tanto os clientes que desejam usufruir do estabelecimento quanto do estabelecimento em cadastrar clientes e realizar o fechamento das contas. 
						</p>
						<p class="about-text">
						O intuito do Mellow Suite é justamente sanar a deficiência que causa tanto prejuizo, otimizando o tempo de obtenção dos dados dos novos clientes, tratamento dos lançamentos e pedidos realizados e facilitando o fechamento e faturamento das contas de forma a diminuir a necessidade de filas de espera.
						</p>
						<p class="about-text">
						O trabalho de conclusão de curso proposto também tem como objetivo demonstrar as mais novas tecnologias e métodos de desenvolvimento para várias áreas da programação e análise. Para isso, serão utilizadas tecnologias gratuitas e de grande reconhecimento no mercado.
						</p>
					</div>
				</div>
			</div>
		</section>

		<section id="services">
			<div class="container wow fadeInUp">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title">Diferenciais</h3>
						<div class="section-title-divider"></div>
						<p class="section-description"></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 service-item zoom-in">
						<div class="service-icon btn bg-pink btn-circle-lg waves-effect waves-circle waves-float">
							<i class="material-icons">group_add</i>
						</div>
						<h4 class="service-title"><a href="">Cadastro facilitado</a></h4>
						<p class="service-description">
							E aquela demora para passar suas informações? Aqui não tem isso não! 
							Com o précadastro, é possível passar suas informações para os estabelecimentos credenciados de antemão.
						</p>
					</div>

					<div class="col-md-4 service-item zoom-in">
						<div class="service-icon btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
							<i class="material-icons">whatshot</i>
						</div>
						<h4 class="service-title"><a href="">Menos filas</a></h4>
						<p class="service-description">
							E mais diversão! Fica ainda mais rápido ser atendido em seu estabelecimento favorito, 
							é possível visualizar os produtos oferecidos e realizar o seu pedido mostrando o código de sua comanda.
						</p>
					</div>

					<div class="col-md-4 service-item zoom-in">
						<div class="service-icon btn bg-orange btn-circle-lg waves-effect waves-circle waves-float">
							<i class="material-icons">smartphone</i>
						</div>
						<h4 class="service-title"><a href="">A comanda é digital</a></h4>
						<p class="service-description">
							Cansou de carregar aqueles papeizinhos com medo de perder e pagar a multa? Sem problemas!
							A comanda aqui é digital, pode ser visualizado diretamente do seu smartphone.
						</p>
					</div>
				</div>
			</div>
		</section>

		<section id="portfolio">
			<div class="container wow fadeInUp">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title">Mellow Suite</h3>
						<div class="section-title-divider"></div>
						<p class="section-description">Suíte de aplicativos para todos os gostos</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4"> 
						<a class="portfolio-item" href="<?=site_url('mellow.php');?>">
							<div class="portfolio-item info-box-3 bg-pink hover-zoom-effect">
								<div class="icon">
									<i class="material-icons">face</i>
								</div>
								<div class="content">
									<div class="text"><?=$this->lang->str(100031);?></div>
									<div class="lb-box"><?=$this->lang->str(100096);?></div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4"> 
						<a class="portfolio-item" href="<?=site_url('mellow.php');?>">
							<div class="portfolio-item info-box-3 bg-cyan hover-zoom-effect">
								<div class="icon">
									<i class="material-icons">location_city</i>
								</div>
								<div class="content">
									<div class="text"><?=$this->lang->str(100031);?></div>
									<div class="lb-box"><?=$this->lang->str(100095);?></div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4"> 
						<a class="portfolio-item" href="<?=site_url('mellow.php');?>">
							<div class="portfolio-item info-box-3 bg-orange hover-zoom-effect">
								<div class="icon">
									<i class="material-icons">settings</i>
								</div>
								<div class="content">
									<div class="text"><?=$this->lang->str(100031);?></div>
									<div class="lb-box"><?=$this->lang->str(100094);?></div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>

		<section id="team">
			<div class="container wow fadeInUp">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title">A equipe</h3>
						<div class="section-title-divider"></div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="member">
							<div class="pic" style="background-image: url(assets/images/equipe/joao.jpg);"></div>
							<h4>João Eugênio Marynowski</h4>
							<span>Professor orientador</span>
							<div class="social">
								<a href="http://lattes.cnpq.br/3265921900792672"><i class="fa fa-lattes"></i></a>
								<a href="https://www.linkedin.com/in/joao-eugenio-marynowski-5606a339/"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="member">
							<div class="pic" style="background-image: url(assets/images/equipe/amanda.jpg);"></div>
							<h4>Amanda Naito Alves Chagas</h4>
							<span>Analista desenvolvedor</span>
							<div class="social">
								<a href="https://www.facebook.com/amanda.naito"><i class="fa fa-facebook"></i></a>
								<a href="https://www.linkedin.com/in/amandanaito"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="member">
							<div class="pic" style="background-image: url(assets/images/equipe/harrison.jpg);"></div>
							<h4>Harrison Brunno dos Santos</h4>
							<span>Analista de negócios</span>
							<div class="social">
								<a href="https://www.facebook.com/harrisonbsantos"><i class="fa fa-facebook"></i></a>
								<a href="https://www.linkedin.com/in/harrison-santos-35a75750/"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="member">
							<div class="pic" style="background-image: url(assets/images/equipe/marcelo.jpg);"></div>
							<h4>Marcelo Benigno Feltran</h4>
							<span>Analista de sistemas</span>
							<div class="social">
								<a href="https://www.facebook.com/marcelo.benignofeltran"><i class="fa fa-facebook"></i></a>
								<a href="https://www.linkedin.com/in/marcelo-benigno-feltran-325185134/"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							&copy; Copyright <strong><?=$this->lang->str(100000);?></strong>.
						</div>
					</div>
				</div>
			</div>
		</footer>

	  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	</body>
</html>
