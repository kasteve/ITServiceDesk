<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Issue/Complaint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .add-issue-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .add-issue-form {
            width: 400px;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="add-issue-container">
        <div class="add-issue-form">
            <h4>Add New Issue/Complaint</h4>
            <form action="<?php echo e(route('add-issue')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="reporter_name">Name of Reporter</label>
                    <input type="text" class="form-control" placeholder="Enter reporter's name" name="reporter_name" value="<?php echo e(old('reporter_name')); ?>"> 
                    <span class="text-danger"><?php $__errorArgs = ['reporter_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>                
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department">
                        <option value="">Select department</option>
                        <option value="Department 1">Department 1</option>
                        <option value="Department 2">Department 2</option>
                        <option value="Department 3">Department 3</option>
                        <!-- Add more options if needed -->
                    </select>
                    <span class="text-danger"><?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                </div>
                <div class="form-group">
                    <label for="issue_name">Issue Name</label>
                    <input type="text" class="form-control" placeholder="Enter issue name" name="issue_name" value="<?php echo e(old('issue_name')); ?>">
                    <span class="text-danger"><?php $__errorArgs = ['issue_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                </div>
                <div class="form-group">
                    <label for="time_of_reporting">Time of Reporting</label>
                    <input type="datetime-local" class="form-control" name="time_of_reporting" value="<?php echo e(old('time_of_reporting')); ?>">
                    <span class="text-danger"><?php $__errorArgs = ['time_of_reporting'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                </div>
                <div class="form-group">
                    <label for="impacted_service">Impacted Service</label>
                    <input type="text" class="form-control" placeholder="Enter impacted service" name="impacted_service" value="<?php echo e(old('impacted_service')); ?>">
                    <span class="text-danger"><?php $__errorArgs = ['impacted_service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                </div>
                <div class="form-group">
                    <label for="assigned_to">Assigned To</label>
                    <select class="form-control" name="assigned_to">
                        <option value="">Select person</option>
                        <option value="Person 1">Person 1</option>
                        <option value="Person 2">Person 2</option>
                        <option value="Person 3">Person 3</option>
                        <!-- Add more options if needed -->
                    </select>
                    <span class="text-danger"><?php $__errorArgs = ['assigned_to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                </div>
                <div class="form-group">
                    <label for="comment">Other Comments</label>
                    <textarea class="form-control" name="comment" rows="3"><?php echo e(old('comment')); ?></textarea>
                    <span class="text-danger"><?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit" name="add_issue">Add Issue</button>
                </div>
                <br>
                <a href="dashboard">Back to Dashboard</a>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\Users\stephen.kakaire\Documents\SteveTech\resources\views/auth/newissue.blade.php ENDPATH**/ ?>