<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title" style="background-color: black;color:white;">
                    <?php
                    $session = session();
                    $username = $session->get('username');
                    if ($username) {
                        echo '<span>Welcome, ' . esc($username) . ' !</span>';
                    }


                    $userModel = new \App\Models\userModel();

                    $session = session();
                    $username = $session->get('username');


                    $idUser = $userModel->findIdByUsername($username);
                    $groupId = $userModel->findGroupByUser($idUser['id']);
                    $Role = $groupId[0]->group_id;
                    ?></li>
                <li class="menu-title">Main Menu</li>
                <li><a href="dashboard"> <i class="menu-icon ti-email"></i>Dashboard </a></li>
                <li><a href="data-mahasiswa"> <i class="menu-icon fa fa-table"></i>Mahasiswa Berprestasi </a></li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-th"></i> Informasi Lomba
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="now"> Now </a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="coming-soon"> Coming Soon </a></li>
                    </ul>
                </li>
                <li><a href="InfoUser"> <i class="menu-icon fa fa-user"></i>Informasi User</a></li>

                <li class="menu-title">Auth</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-cogs"></i>Account
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-out"></i><a href="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>