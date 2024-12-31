<div>
    <h1><?php echo e($counter); ?></h1>
    <input type="number" wire:model.blur='num'>

    <button wire:click="changeCount(<?php echo e($num); ?>)">Chang Counter</button>
</div>
<?php /**PATH C:\xampp\htdocs\blog2\blog\resources\views/livewire/first-componet.blade.php ENDPATH**/ ?>