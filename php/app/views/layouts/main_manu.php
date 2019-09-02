<?php
    $menu= Router::getMenu('menu_acl');
    $currentPage = curentPage();


    ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo MENU_BRAND ;?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_manu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_manu">
        <ul class="navbar-nav mr-auto">
            <?php
                foreach ($menu as $key=>$val):
              $active= '';
            ?>

            <?php


            if (is_array($val)):
            ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <?= $key ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($val as $k=>$v):
                            $active = ($val == $currentPage)? 'active':'';
                            ?>
                            <?php if ($k == 'separator'):?>
                            <li  class="divider" role="separator">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <?php else:

                            ?>
                            <li><a class="<?=$active?> nav-link" href="/<?=$v?>"><?=$k?></a></li>
                            <?php endif;?>

                        <?php endforeach;?>
                    </ul>
                </li>

            <?php else:
                $active = ($val == $currentPage)? 'active':'';
                ?>
                <li  class="nav-item" ><a class="<?=$active?> nav-link"  class="nav-link" href="/<?=$val?>"><?=$key?></a></li>
            <?php endif; ?>

            <?php endforeach; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">

            <?php

            if(currentUser()): ?>
            <li  class="nav-item"><a href="" class="nav-link">Hello <?php echo currentUser()->fname; ?></a></li>
            <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>