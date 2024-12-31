<!DOCTYPE html>
<html  lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="<?php echo e(config('app.name')); ?>" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title><?php echo e(config('app.name')); ?></title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <?php echo \Filament\Support\Facades\FilamentAsset::renderStyles() ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>

    </head>

    <body class="antialiased">
        <?php echo e($slot); ?>


        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('notifications');

$__html = app('livewire')->mount($__name, $__params, 'lw-3550703993-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

        <?php echo \Filament\Support\Facades\FilamentAsset::renderScripts() ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>

        
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\blog2\blog\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>