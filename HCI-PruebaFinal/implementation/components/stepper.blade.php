<?php /*
  Componente Stepper (markup de ejemplo)
  Pasos: pasar array $steps = [['label'=>'Paso 1','state'=>'done'], ['label'=>'Paso 2','state'=>'active'], ...]
*/ ?>
<?php if(!isset($steps)) $steps = []; ?>
<div class="hci-stepper" role="tablist" aria-label="Progreso">
    <?php foreach($steps as $i => $s): ?>
        <div class="step <?= htmlspecialchars($s['state'] ?? '') ?>">
            <div class="circle"><?= $i+1 ?></div>
            <div class="label"><?= htmlspecialchars($s['label']) ?></div>
        </div>
    <?php endforeach; ?>
</div>
