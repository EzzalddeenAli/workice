<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo trans('app.'.'calendar_feed'); ?></h4>
        </div>
        
        <?php echo Form::open(['class' => 'bs-example form-horizontal']); ?>

        
        <div class="modal-body">

            <h4><?php echo trans('app.'.'subscribe_to_events'); ?></h4>
            <ul>
                <li><?php echo trans('app.'.'copy_ical_url'); ?></li>
            </ul>
            <div class="form-group">
                <label class="col-lg-3 control-label">iCal URL</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" value="webcal://<?php echo e(parse_url(config('app.url'))['host'].'/calendar/feed/'.Auth::user()->calendar_token); ?>">
                </div>

                
            </div>
            
            <h4><?php echo trans('app.'.'adding_google_calendar'); ?></h4>
            <ul>
                <li>Copy the above iCal webcal link</li>
                <li>Login to your Google Calendar and select <strong>Add by URL</strong> from the menu within <strong>Other Calendars</strong></li>
                <li>Paste the calendar feed URL into the box provided and click <strong>Add Calendar</strong></li>
                <li>Once you have completed these steps it may take a few minutes for your events to appear in your google calendar</li>
            </ul>

            <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="fas fa-info-circle"></i> Use similar procedure to add to other calendar apps.
                  </div>


        <div class="line line-dashed"></div>

            
        </div>


        <div class="modal-footer">
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('calendar.download')); ?>" class="btn btn-info btn-rounded"><?php echo e(svg_image('solid/cloud-download-alt')); ?> <?php echo trans('app.'.'download'); ?> </a>
        </div>

        <?php echo Form::close(); ?>

    </div>
</div>