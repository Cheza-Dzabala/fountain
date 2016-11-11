<!-- BEGIN WIDGET -->
<div class="col-md-4">
    <!-- BEGIN WIDGET THUMB -->
    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
        <h4 class="widget-thumb-heading">Current DISBURSED</h4>
        <div class="widget-thumb-wrap">
            <i class="widget-thumb-icon bg-green icon-bulb"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-subtitle">MWK</span>
                <span class="widget-thumb-body-stat" data-counter="counterup" >{{ number_format($totalDisbursed, 2) }}</span>
            </div>
        </div>
    </div>
    <!-- END WIDGET THUMB -->
</div>
<!-- END WIDGET -->

<!-- BEGIN WIDGET -->
<div class="col-md-4">
    <!-- BEGIN WIDGET THUMB -->
    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
        <h4 class="widget-thumb-heading">Current Defaulted</h4>
        <div class="widget-thumb-wrap">
            <i class="widget-thumb-icon bg-red icon-layers"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-subtitle">MWK</span>
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">0</span>
            </div>
        </div>
    </div>
    <!-- END WIDGET THUMB -->
</div>
<!-- END WIDGET -->

<!-- BEGIN WIDGET -->
<div class="col-md-4">
    <!-- BEGIN WIDGET THUMB -->
    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
        <h4 class="widget-thumb-heading">Current Collected</h4>
        <div class="widget-thumb-wrap">
            <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-subtitle">MWK</span>
                <span class="widget-thumb-body-stat" data-counter="counterup">{{ number_format($totalCollected, 2) }}</span>
            </div>
        </div>
    </div>
    <!-- END WIDGET THUMB -->
</div>
<!-- END WIDGET -->
