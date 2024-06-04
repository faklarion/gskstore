<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-tag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Merk
                        </span>
                        <span class="info-box-number"><?php
                        $this->db->select('*');

                        $query = $this->db->get('tbl_merk');
                        $num = $query->num_rows();
                        echo $num ?></span>
                    </div>

                </div>
            </div>

            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-tablet"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tipe</span>
                        <span class="info-box-number"><?php
                        $this->db->select('*');

                        $query = $this->db->get('tbl_tipe');
                        $num = $query->num_rows();
                        echo $num ?></span>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Harga Terinput</span>
                        <span class="info-box-number"><?php
                        $this->db->select('*');

                        $query = $this->db->get('tbl_harga');
                        $num = $query->num_rows();
                        echo $num ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">GSK Store</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""
                        data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" style="">
            Selamat Datang di Galery Second Kalimantan.
            </div>

            <div class="box-footer" style="">
            Selamat Bekerja dan Sukses Selalu Untuk Anda.
            </div>

        </div>
    </section>
</div>