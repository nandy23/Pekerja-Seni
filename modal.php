<!-- Modal -->
<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign up.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control form-control-user" id="name" aria-describedby="emailHelp" placeholder="Your Name..." name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Email Address..." name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password..." name="password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirmation Password</label>
                        <input type="password" class="form-control form-control-user" id="password2" placeholder="Confirmation Password..." name="password2">
                    </div>
                    <button type="submit" class="btn btn-primary form-control" name="signup">Sign up</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary form-control" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign in.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email Address..." name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password..." name="password">
                    </div>
                    <button type="submit" class="btn btn-primary form-control" name="signin">Sign in</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary form-control" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal vidio -->
<div class="modal fade" id="vidio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vidio Portofolio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?= $portofolio['link_yutub'] ?>" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary mr-0" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal chat -->
<div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control" id="pesan" aria-describedby="pesan" name="pesan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary form-control" name="kirim">Kirim Pesan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary form-control" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- detail vidio -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="embed-responsive embed-responsive-16by9 modal-body">
                <iframe class="embed-responsive-item" src="<?= $portofolio['link_yutub']; ?>" allowfullscreen></iframe>
            </div>
            <div class="modal-body">
                <b class="d-inline-block text-truncate mr-1 ml-1"><?= $portofolio['nama']; ?></b>
                <p class="d-inline-block text-truncate mr-1 ml-1"><?= $portofolio['judul']; ?></p>
            </div>
            <div class=" modal-footer">
                <button type="submit" class="btn btn-secondary mr-0" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Post Proyek -->
<div class="modal fade" id="proyek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Post Proyek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="tetx" class="form-control" id="nama" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="password">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary form-control" name="post">Post Proyek</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary form-control" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>