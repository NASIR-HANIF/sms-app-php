<?php

echo '

            <nav class="navbar navbar-expand-sm bg-white shadow-sm">
                <button class="btn toggler"><i class="fa fa-align-left"></i></button>
            </nav>

            <script>
        $(document).ready(function () {
            $(".toggler").click(function () {
             var position =  $(".side-nav").hasClass("side-nav-open");
            if(position){
                $(".side-nav").removeClass("side-nav-open");
                $(".side-nav").addClass("side-nav-close");
                // page control
                $(".page").removeClass("page-open");
                $(".page").addClass("page-close");
            }else{
                $(".side-nav").addClass("side-nav-open");
                $(".side-nav").removeClass("side-nav-close");
                // page control
                $(".page").addClass("page-open");
                $(".page").removeClass("page-close");
            }
            })
        })
    </script>

';
