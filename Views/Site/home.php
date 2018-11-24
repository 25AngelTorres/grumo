<?php
	//Vista Privada
	include ('../../Controllers/controllerSecurity.php');
	
	//header
	include ('header.php');
?>

	<div id="content-wrapper">
		<h1 class="">HOME</h1>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">404 Error</li>
          </ol>

          <!-- Page Content -->
          <h1 class="display-1">404</h1>
          <p class="lead">Page not found. You can
            <a href="javascript:history.back()">go back</a>
            to the previous page, or
            <a href="index.html">return home</a>.</p>

        </div>
        <!-- /.container-fluid -->
	</div>
      <!-- /.content-wrapper -->
</div>
<!-- Div #wrapper del heater-->
<?php
	//Footer
	include ('footer.php');
?>