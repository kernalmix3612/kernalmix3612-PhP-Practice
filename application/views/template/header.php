<html>
<head>
    <title>CTube</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CTube</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>login"> Home </a>
                <a href="<?php echo base_url(); ?>upload"> upload </a>
                <a href="<?php echo base_url(); ?>UserInfoControl"> About User </a>
                <a href="<?php echo base_url(); ?>Signin"> Signin </a>
<!--                <a href="--><?php //echo base_url(); ?><!--Media"> Media </a>-->
                <a href="<?php echo base_url(); ?>Mediacontroler"> More Media </a>
            </li>
        </ul>
        <ul class="navbar-nav my-lg-0">
            <?php if(!$this->session->userdata('logged_in')) : ?>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>login"> Login </a>
                </li>
            <?php endif; ?>
            <?php if($this->session->userdata('logged_in')) : ?>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>login/logout"> Logout </a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
    <form class="form-inline my-2 my-lg-0">
        <?php echo form_open('ajax'); ?>
        <input class="form-control mr-sm-2" type="search" id="search_text" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> </button>
        <?php echo form_close(); ?>
</nav>
<div class="container">
    <div class="collapse" id="collapseExample">
        <div class="card card-body" id="result">

        </div>
    </div>
    <script>
        $(document).ready(function(){
            load_data();
            function load_data(query){
                $.ajax({
                    url:"<?php echo base_url(); ?>ajax/fatch",
                    method:"GET",
                    data:{query:query},
                    success:function(response){
                        $('#result').html("");
                        if (response == "" ) {
                            $('#result').html(response);
                        }else{
                            var obj = JSON.parse(response);
                            if(obj.length>0){
                                var items=[];
                                $.each(obj, function(i,val){
                                    items.push($("<h4>").text(val.filename));
                                    if (val.filename.includes("jpg")) {
                                        items.push($('<img width="320" height="240" src="' +'<?php echo base_url(); ?>/uploads/' +val.filename + '" />'));
                                    }else{
                                        items.push($('<video width="320" height="240" controls><source  src="' +'<?php echo base_url(); ?>/uploads/' +val.filename + '" type="video/mp4"></video>'));
                                    }
                                });
                                $('#result').append.apply($('#result'), items);
                            }else{
                                $('#result').html("Not Found!");
                            };
                        };
                    }
                });
            }
            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != ''){
                    load_data(search);
                }else{
                    load_data();
                }
            });
        });
    </script>
    <style>
        button.btn.collapsed:before
        {
            content:'Show Result' ;
        }
        button.btn:before
        {
            content:'Hide Result' ;
        }
    </style>
