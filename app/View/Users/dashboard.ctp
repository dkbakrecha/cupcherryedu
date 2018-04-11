
<div class="row">
    <div class="col-lg-3 ">
        <?php echo $this->element("sidebar/dashboard_left"); ?>
    </div>

    <div class="col-lg-6">
        <div class="row">
            <div class="box">
                <div class="box-content">
                    
                </div>
            </div>

            
        </div>
    </div>
    <div class="col-lg-3">
        <?php echo $this->element("sidebar/dashboard_right"); ?>



    </div>

</div>

<script type="text/javascript">
    $(function () {
        $('#short').sortable();
    });
</script>