<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA HP SECOND</h3>
                    </div>
                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <!-- <?php echo anchor(site_url('tbl_second/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>-->
                                </div>
                            </div>
                        </div>



    <table id="example" class="display">
        <thead>
            <tr>
            <?php  if (is_array($sheet_data) ) { ?>
                    <?php foreach ($sheet_data[0] as $header): ?>
                        <th><?php echo htmlspecialchars($header, ENT_QUOTES, 'UTF-8'); ?></th>
                    <?php endforeach; ?>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
        <?php  if (is_array($sheet_data) && count($sheet_data)  && is_countable($sheet_data) ) : ?>
            <?php for ($i = 1; $i < count($sheet_data); $i++): ?>
                <tr>
                        <?php foreach ($sheet_data[$i] as $cell): ?>
                            <td><?php echo htmlspecialchars($cell, ENT_QUOTES, 'UTF-8'); ?></td>
                        <?php endforeach; ?>
                </tr>
            <?php endfor; ?>
        <?php endif ?>
        </tbody>
    </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            'responsive': true
        });
    });
</script>
