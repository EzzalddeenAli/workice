<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo trans('app.'.'create'); ?>  </h4>
            </div>
    
    
            <div class="modal-body">
    
                <div class="panel-body">
    
                <?php echo Form::open(['route' => 'users.api.save', 'class' => 'bs-example form-horizontal ajaxifyForm']); ?>

                   
    
                    <input class="display-none" type="hidden" name="username"/>
                    <input class="display-none" type="hidden" name="password"/>
    
    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo trans('app.'.'username'); ?>  <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control" placeholder="johndoe" required>
                            </div>
                            <div class="col-md-6">
                                <label><?php echo trans('app.'.'password'); ?>  </label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            
                        </div>
                    </div>
    
    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo trans('app.'.'fullname'); ?> <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label><?php echo trans('app.'.'email'); ?> <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="you@domain.com" required>
                            </div>
                            <div class="col-md-6">
                                <label>Desk </label>
                                <select class="select2-option form-control" name="desk">
                                    <?php $__currentLoopData = App\Entities\Desk::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($desk->name); ?>"><?php echo e($desk->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                                
                                
                            
    
                        </div>
                    </div>
    
    
                    
                        

                            
                                
    
                                
                                        
                                        
                                            
                                        
    
    
                                
    
                            
                        
                    
    
    
                    
                        
                            
                                
                                
                            
                            
                                
                                
                                    
                                        
                                    
    
                                
                            
                        
                    
    
                    
                        
                            
                                
                                
                            
                            
                                
                                
                            
                            
                                
                                
                            
                        
                    
    
    
                    
                        
                            
                                
                                
                            
                            
                                
                                
                            
                        
                    
    
    
                    
                        
                            
                                
                                
                            
                            
                                
                                
                            
                        
                    
    
    
                    
                        
                            
                                
    
                                
                            
    
                            
                                
    
    
                                
                                        
                                            
                                                
                                            
                                        
                                
    
    
                            
                        
                    
    
    
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><?php echo trans('app.'.'locale'); ?>  <?php echo e(get_option('locale')); ?></label>
                            <select class="select2-option form-control" name="locale">
                                <?php $__currentLoopData = locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($loc['code']); ?>" <?php echo e(get_option('locale') == $loc['code'] ? 'selected' : ''); ?>>
                                        <?php echo e(ucfirst($loc['language'])); ?> - <?php echo e($loc['code']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>

                        
                            
                            

                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">

                <div class="col-md-12">

                            <label class="display-block"><?php echo trans('app.'.'roles'); ?></label>
                            <select name="roles[]" class="select2-option form-control" multiple="multiple">
                                <?php $__currentLoopData = Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->name); ?>" <?php echo e($role->name == get_option('default_role') ? 'selected' : ''); ?>><?php echo e(ucfirst($role->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                </div>
            </div>

                    <?php echo $__env->make('partial.privacy_consent', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
                    <div class="modal-footer">
                        
                        <?php echo closeModalButton(); ?>

                        <?php echo renderAjaxButton(); ?>

    
    
                    </div>
    
                    <?php echo Form::close(); ?>

    
    
                </div>

            </div>
    
    
        </div>

    </div>
    
    
    <?php $__env->startPush('pagestyle'); ?>
    <?php echo $__env->make('stacks.css.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('pagescript'); ?>
    <?php echo $__env->make('stacks.js.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partial/ajaxify', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopPush(); ?>
    
    <?php echo $__env->yieldPushContent('pagestyle'); ?>
    <?php echo $__env->yieldPushContent('pagescript'); ?>