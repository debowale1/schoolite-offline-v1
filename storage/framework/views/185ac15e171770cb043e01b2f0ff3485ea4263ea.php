<?php $__env->startSection('title',  $student->name); ?>


<?php $__env->startSection('result-heading'); ?>
<img src="<?php echo e(asset('img/banner.jpg')); ?>" class="m-b-xs" alt="profile" width="100%">
  <div class="row m-b-xs m-t-xs">
                <div class="col-md-12">

                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td rowspan="3">
                                <div class="profile-image">
                                    <img src="<?php echo e(is_file(asset('storage/' . $student->image)) ? asset('storage/' . $student->image) : asset('storage/images/' . strtolower($student->sex) . '.png')); ?>" class="img-rounded m-b-md" alt="profile">
                                </div>
                            </td>
                            <td>
                                Name: <strong> <?php echo e($student->name); ?> </strong>
                            </td>
                            <td>
                                Reg Number: <strong> <?php echo e($student->admin_number); ?> </strong>
                            </td>
                            <td>
                                <strong>Level</strong> <?php echo e($results->first()->classroom->level->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Class: <strong> <?php echo e($results->first()->classroom->name); ?> </strong>
                            </td>
                            <td>
                                No in class: <strong> <?php echo e($results->first()->classroom_students_count()); ?> </strong>
                            </td>
                            <td>
                              <strong>Class teacher</strong> <?php echo e($student->classroom->teacher->name); ?>

                            </td>
                        </tr>


                        <tr>
                            <td>
                                Percentage: <strong> <?php echo e(round($student->term_percentage($results), 2) . '%'); ?> </strong>
                            </td>
                            <td>
                                Position: <strong> <?php echo e($student->first_term_position($results->first()->session_id)); ?> </strong>
                            </td>
                            <td>
                              <strong>Next term begins</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('result-body'); ?>
        <table class="table result-table">
            <thead>
            <tr>
                <th>Subjects</th>
                <th class="text-center">CA1/20</th>
                <th class="text-center">CA2/20</th>
                <th class="text-center">CA Total</th>
                <th class="text-center">Exam/60</th>
                <th class="text-center">Grand Total</th>
                <th class="text-center">Grade</th>
                <th class="text-center">Position</th>
                <th class="text-center">Remarks</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($result->subject->name); ?></td>
                <td class="text-center"><?php echo e(str_pad($result->first_ca, 2, '0', 0)); ?></td>
                <td class="text-center"><?php echo e(str_pad($result->second_ca, 2, '0', 0)); ?></td>
                <td class="text-center"><?php echo e(str_pad($result->first_ca + $result->second_ca, 2, 0)); ?></td>
                <td class="text-center"><?php echo e(str_pad($result->exam, 2, '0')); ?></td>
                <td class="text-center"><?php echo e(str_pad($result->total(), 2, '0', 0)); ?></td>
                <td class="text-center"><?php echo e($result->grade()); ?></td>
                <td class="text-center"><?php echo e($result->position()); ?></td>
                <td class="text-center"><?php echo e($result->remark()); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('result-footer'); ?>
<?php echo e(" Comments "); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>