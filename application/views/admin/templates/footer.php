<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">PT. Dito Enviro Kreasi 2021</div>
        </div>
    </div>
</footer>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url().'assets/admin/admin_theme/js/scripts.js'?>"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url().'assets/admin/admin_theme/js/datatables-simple-demo.js'?>" defer></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- SUMMERNOTE JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<?php $js != null ? $this->load->view('admin/JS/' . $js) : '';  ?>
</body>

</html>

<?= base_url().'assets/admin/admin_theme/js/datatables-simple-demo.js'?>