<div class="modal fade border-info" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header pt-2 border-info">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <?= $header ?? '' ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 ">
                <?= $message ?? ''?>
            </div>
        </div>
    </div>
</div>
<?php if ($showModal ?? false):
    ; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
        });
    </script>

<?php endif; ?>