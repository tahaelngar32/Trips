
<div>
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow p-4 text-center" style="width: 100%; border-radius: 15px; direction: rtl;">
        <h2 class="text-center mb-4 text-primary fw-bold">حجز رحلة سياحية</h2>
        <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
            <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <form wire:poll.1s wire:submit.prevent="submit">



            <div class="row mb-3">
                <div class="col-4">
                    <label for="name" class=" form-label fw-bold">اسم طالب الحجز</label>
                </div>
                <div class="col-6">
                    <input type="text" id="name" wire:model.lazy="name" class=" form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" placeholder="أدخل اسمك" >
                    <div class="invalid-feedback"><?php echo e($errors->first('name')); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="num_people" class="mb-4 form-label fw-bold">عدد الأفراد</label>
                </div>
                <div class="col-6">
                    <input type="number" id="num_people" wire:model="num_people" class="form-control <?php echo e($errors->has('num_people') ? 'is-invalid' : ''); ?>"
                           placeholder="أدخل عدد الأفراد" required>
                    <div class="invalid-feedback"><?php echo e($errors->first('num_people')); ?></div>

                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="trip_id" class="mb-4 form-label fw-bold">الرحلة المراد الحجز لها</label>

                </div>
                <div class="col-6">
                    <select id="trip_id" wire:model="trip_id" class=" form-control form-select <?php echo e($errors->has('trip_id') ? 'is-invalid' : ''); ?>" >
                        <option value="">-- اختر رحلة --</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($trip->id); ?>"><?php echo e($trip->trip->name); ?>: <?php echo e($trip->date_from); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                    <div class="invalid-feedback"><?php echo e($errors->first('trip_id')); ?></div>

                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label class="mb-4 form-label fw-bold">الخدمات المقدمة</label>

                </div>
                <div class="col-6">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $serves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-4 form-control form-check ">
                            <div class="row">
                                <div class="col-2">
                                    <input type="checkbox"
                                           id="service_<?php echo e($serve->id); ?>"
                                           value="<?php echo e($serve->id); ?>"
                                           wire:model="services"
                                           class="form-check-input ">
                                </div>
                                <div class="col-10">
                                    <label for="service_<?php echo e($serve->id); ?>" class="form-check-label ms-2">
                                        <?php echo e($serve->name); ?> (<?php echo e($serve->getPriceBasedOnPeople($this->num_people)); ?>$)
                                    </label>
                                </div>
                            </div>


                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="row mb-6">
                <div class="col-4">
                    <label class="form-label fw-bold">السعر الإجمالي</label>

                </div>
                <div class="col-6">
                    <div class="form-control bg-light text-center fw-bold"><?php echo e($price); ?>$</div>

                </div>
            </div>

            <div class="row ">
                <div style="margin-right: 33%" class=" col-6 ">
                    <button type="submit" class=" btn btn-primary w-100 py-2">تأكيد الحجز</button>

                </div>
            </div>

        </form>
    </div>
</div>
    <div class="container" dir="rtl">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الرحلة</th>
                <th>العدد</th>
                <th>السعر الاجمالي</th>
                <th>الخدمات المقدمة</th>
            </tr>
            </thead>
            <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $Bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($booking->name_cust); ?></td>
                    <td><?php echo e($booking->tripDetails->trip->name); ?>:<?php echo e($booking->tripDetails->date_from); ?></td>
                    <td><?php echo e($booking->number_parson); ?></td>
                    <td><?php echo e($booking->total_price); ?></td>

                    <td>
                        <!--[if BLOCK]><![endif]--><?php if($booking->services->isNotEmpty()): ?>
                            <ul class="list-unstyled">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $booking->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($key+1); ?>-<?php echo e($service->serviec->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        <?php else: ?>
                            <span class="text-muted">لا توجد خدمات مضافة</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>

            </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            </tbody>
        </table>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\blog2\blog\resources\views/livewire/booking-form.blade.php ENDPATH**/ ?>