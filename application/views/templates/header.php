<html>
    <head>
        <meta charset="utf-8">
        <title>Colonos de Monteverde</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/designs.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/login.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/persona_fisica.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/persona_moral.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/propiedad.js"></script>
        </head>
        <body>
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">Colonos de Monteverde</a>
                    </div>
                    <div id="navbar">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                            <li><a href="<?php echo base_url(); ?>news">Noticias</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url(); ?>/persona_fisica/create_personas_fisicas">Personas Fisicas</a></li>
                            <li><a href="<?php echo base_url(); ?>/CpersonasMorales/create_personas_mor">Personas Morales</a></li>
                            <li><a href="<?php echo base_url(); ?>/c_propiedad/create_propiedad">Propiedades</a></li>
                            <li><a href="">Chat</a></li>
                            <li><a href="<?php echo base_url(); ?>usuarios/registro">Usuarios</a></li>
                            <li><a href="<?php echo base_url(); ?>usuarios/login">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">

                <?php if($this->session->flashdata('user_registered')) : ?>
                    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
                <?php endif; ?>

                <?php if ($this->session->flashdata('login_failed')) : ?>
                    <?php
                    echo '<p class="alert alert-danger text-center">' . $this->session->flashdata('login_failed') . '</p>';

                    $self = $_SERVER['PHP_SELF'];
                    header("refresh:2; url=$self");
                    ?>
                <?php endif; ?>

                <?php if ($this->session->flashdata('user_loggedin')) : ?>
                    <?php echo '<p class="alert alert-success text-center">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
                <?php endif; ?>

                <?php if ($this->session->flashdata('user_loggedout')) : ?>
                    <?php echo '<p class="alert alert-success text-center">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
                <?php endif; ?>
