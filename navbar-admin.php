<?php
        echo '
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="adminhome.php">Kohiso Web Admin</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                     <li><a href="tampilan.php">Lihat Product</a></li>  
                                    <li><a href="additem.php">Add Product</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Akun<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                       <li><a href="adminuser.php">Lihat Admin</a></li>  
                                    <li><a href="addadmin.php">Add Admin</a></li>
                                    <li><a href="logoutadmin.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            ';
?>
