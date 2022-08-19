<!-- <nav class="navbar navbar-expand-md fixed-top navbar-dark my-bg-navbar p-2">
    <div class="container">
        <a class="navbar-brand" href="<?//= MYURL; ?>">Tata Usaha</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href='<?//= MYURL; ?>absen' class="nav-link" > Virtual Absen </a>
                </li>
                <li class="nav-item">
                    <a href='#navbar' data-toggle='tooltip' title='Menu' class="nav-link" id="login"><i class="fa fa-bar"></i>adf</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->

<nav class="navbar fixed-top navbar-dark bg-primary my-bg-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?= MYURL ;?>"><?= $this->session->userdata('pppomn_lain'); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- offcanvas -->
        <div class="offcanvas offcanvas-end text-bg-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?= $this->session->userdata('pppomn_nama'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= MYURL ; ?>admin">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= MYURL;?>login/logout" onclick="return confirm('Akhiri Sesi Ini?')">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    <!-- akhir offcanvas -->
    </div>
</nav>

<!-- Modal -->
<!-- <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method='post'>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"> <i class="fa fa-user-tie"></i> </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
</div>        -->
<div class="p-3">
    <section>