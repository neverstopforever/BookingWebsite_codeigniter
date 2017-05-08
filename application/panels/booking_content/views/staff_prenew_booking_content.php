<?php
if (isset($error_message) && $error_message!=""){ ?>
    <script>
        setTimeout(function() {
            $.bootstrapGrowl('<?php echo $error_message;?>', {
                type: 'danger',
                align: 'center',
                width: 'auto',
                allow_dismiss: false
            });
        }, 1);
    </script>
<?php } ?>
<?php
if (isset($success_message) && $success_message!=""){ ?>
    <script>
        setTimeout(function() {
            $.bootstrapGrowl('<?php echo $success_message;?>', {
                type: 'success',
                align: 'center',
                width: 'auto',
                allow_dismiss: false
            });
        }, 1);
    </script>
<?php } ?>
<div class="content twocols">

    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid guestlist">
                <p class="left" style="margin-top:15px; color:#424242;"><b>Choose which facility you would like to book</b></p>
                <div class="clear"></div>
            </div>
            <form class="form-horizontal form-edit" style="background:url(<?php echo $this->config->base_url();?>r/img/bg_pattern.png); margin-left:20px;margin-top:0;margin-bottom:40px;">
                <div class="row">
                    <div class="col-md-2 booking-create-block">
                        <a href="/booking/create/multi-purpose-function-room">
                            <img src="/r/img/booking.jpg">
                            Multi Purpose Function Room
                        </a>
                    </div>

                    <div class="col-md-2 booking-create-block">
                        <a href="/booking/create/audio_visual_room">
                            <img src="/r/img/audio.jpg">
                            Audio Visual Room
                        </a>
                    </div>

                    <div class="col-md-2 booking-create-block">
                        <a href="/booking/create/bbq_pit_1">
                            <img src="/r/img/bbq.jpg">
                            BBQ Pit 1
                        </a>
                    </div>

                    <div class="col-md-2 booking-create-block">
                        <a href="/booking/create/bbq_pit_2">
                            <img src="/r/img/bbq.jpg">
                            BBQ Pit 2
                        </a>
                    </div>

                    <div class="col-md-2 booking-create-block">
                        <a href="/booking/create/bbq_pit_3">
                            <img src="/r/img/bbq3.jpg">
                            BBQ Pit 3
                        </a>
                    </div>

                    <div class="col-md-2 booking-create-block">
                        <a href="/booking/create/tennis_court_1">
                            <img src="/r/img/tennis.jpg">
                            Tennis Court 1
                        </a>
                    </div>

                    <div class="col-md-2 booking-create-block">
                        <a href="/booking/create/tennis_court_2">
                            <img src="/r/img/tennis.jpg">
                            Tennis Court 2
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style type="text/css">

    .booking-create-block img {
        width: 100%;
    }

    .booking-create-block {
        min-height: 200px;
        margin-bottom: 20px;
    }

    .booking-create-block a {
        font-weight: 300;
        font-size: 14px;
        padding: 0;
        text-decoration: none;
        color: #000000;
    }

</style>