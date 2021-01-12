<footer class="footer">
    <div class="container-fluid">
        <div class="copyright ml-auto">
            {{ date('Y') }}, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://erikwibowo.github.io">Erik Wibowo</a>
        </div>
    </div>
</footer>
<!-- Modal logout -->
<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar dari sistem</h5>
            </div>
            <div class="modal-body">
                <p class="modal-text">Apakah anda yakin akan keluar dari sistem?</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <a href="{{ route('admin.logout') }}" class="btn btn-danger">Keluar</a>
            </div>
        </div>
    </div>
</div>