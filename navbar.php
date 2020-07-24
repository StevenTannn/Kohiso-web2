
 			<nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/index.html">
                    <img src="asset/img/Logo.png" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=shop.php>SHOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="press.php">PRESS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gift.php">EGIFT CARDS</a>
                        </li>
                        <?php if (!isset($_SESSION["signin"])): ?>
                          <li class="nav-item">
                              <a class="nav-link color-light" href="signin.php">SIGN IN</a>
                          </li>
                        <?php else: ?>
                          <li class="nav-item">
                              <a class="nav-link color-light" href="logout.php">LOG OUT</a>
                          </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link color-light" href="cart.php">CART</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-light" href="register">JOIN NOW</a>
                        </li>
                    </ul>
                </div>
            </nav>
