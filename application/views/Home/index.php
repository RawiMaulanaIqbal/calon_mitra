<section>
<!-- ion class="content-header"> -->
  <!--   <h1> Dashboard
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    </ol> -->
</section>


<div class="row">
<div class="col-md-4">
<!--     <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i> </span> -->
    <div class="card">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tertarik</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$this->db->get_where('calon_mitra',["status2"=> "tertarik"])->num_rows()?></div>
                            </div>
                        <div class="col-auto">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tidak Tertarik</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$this->db->get_where('calon_mitra',["status2"=> "belum_tertarik"])->num_rows()?></div>
                            </div>
                        <div class="col-auto">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$this->db->get_where('calon_mitra')->num_rows()?></div>
                            </div>
                        <div class="col-auto">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Deal</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$this->db->get_where('calon_mitra',["status3"=> "deal"])->num_rows()?></div>
                            </div>
                        <div class="col-auto">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Hampir Deal</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$this->db->get_where('calon_mitra',["status3"=> "hampir_deal"])->num_rows()?></div>
                            </div>
                        <div class="col-auto">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tidak Deal</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$this->db->get_where('calon_mitra',["status3"=> "tidak_deal"])->num_rows()?></div>
                            </div>
                        <div class="col-auto">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
                        
